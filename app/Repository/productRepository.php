<?php

namespace App\Repository;

use App\Models\brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use App\Http\Traits\AttachFilesTrait;
use App\Models\ProductColor;
use Illuminate\Support\Facades\Storage;
use App\RepositoryInterface\productIntrface;

class productRepository implements productIntrface
{
    use AttachFilesTrait;

    public function index()
    {
        $products = Product::get();
        return  view('pages.backend.product.index', compact('products'));
    }
    public function create()
    {
        $data['categories'] = category::all();
        $data['brands'] = brand::all();
        $data['colors'] = Color::where('status', 1)->get();
        return  view('pages.backend.product.create', $data);
    }
    public function store($request)
    {
        try {
            $validateData = $request->validated();
            $category = category::findOrFail($validateData['category_id']);
            $product = $category->products()->create([
                'category_id' => $validateData['category_id'],
                'name' => $validateData['name'],
                'slug' => Str::slug($validateData['slug']),
                'small_description' => $validateData['small_description'],
                'description' => $validateData['description'],
                'brand' => $validateData['brand'],


                'orginal_price' => $validateData['orginal_price'],
                'selling_price' => $validateData['selling_price'],
                'quantity' => $validateData['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'featured' => $request->featured == true ? '1' : '0',

                'meta_title' => $validateData['meta_title'],
                'meta_keywoed' => $validateData['meta_keywoed'],
                'meta_description' => $validateData['meta_description'],

            ]);
            //Product Image Table
            //Create Multiple Images For One Product
            if ($request->hasFile("image")) {
                $uploadPath = "Attachments/Products-Images/";
                $i = 1;
                foreach ($request->file("image") as $imagefile) {
                    $extention = $imagefile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imagefile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;
                    $product->ProductImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
                // }
                // if (!empty($request->image)) {
                //     foreach ($request->image as $images) {
                //         $images->storeAs(
                //             'Products-Images/',
                //             Product::latest()->first()->id . '/' . $images->getClientOriginalName(),  //Create Folder By Name Product  //get Original name Photo //Creunt Name
                //             'Products-Images',
                //         );
                //         //get Id from  ProductImages Realashionship
                //         $product->ProductImages()->create([
                //             'image' => $images->getClientOriginalName(),
                //             'product_id' => $product->id,
                //         ]);
                //     }
            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
            }
            //Color and Quantity

            toastr()->success('Data has been saved successfully!');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('product.index');
        }
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.backend.product.show', compact('product'));
    }

    public function edit($id)
    {
        $Product = Product::findOrFail($id);
        $categories = category::all();
        $brands = brand::all();
        $product_color = $Product->productColors->pluck('color_id')->toArray();

        $colors = Color::whereNotIn('id', $product_color)->get();

        return view('pages.backend.product.edit', compact('Product', 'colors', 'categories', 'brands'));
    }

    public function update($request, $product_id)
    {
        try {
            $validateData = $request->validated();
            $product = category::findOrFail($validateData['category_id'])
                ->products()->where('id', $product_id)->first();

            if ($product) {
                $product->update([
                    'category_id' => $validateData['category_id'],
                    'name' => $validateData['name'],
                    'slug' => Str::slug($validateData['slug']),
                    'small_description' => $validateData['small_description'],
                    'description' => $validateData['description'],
                    'brand' => $validateData['brand'],


                    'orginal_price' => $validateData['orginal_price'],
                    'selling_price' => $validateData['selling_price'],
                    'quantity' => $validateData['quantity'],
                    'trending' => $request->trending == true ? '1' : '0',
                    'status' => $request->status == true ? '1' : '0',
                    'featured' => $request->featured == true ? '1' : '0',

                    'meta_title' => $validateData['meta_title'],
                    'meta_keywoed' => $validateData['meta_keywoed'],
                    'meta_description' => $validateData['meta_description'],

                ]);

                //Product Image Table
                //Create Multiple Images For One Product
                if ($request->hasFile("image")) {
                    $uploadPath = "Attachments/Products-Images/";
                    $i = 1;
                    foreach ($request->file("image") as $imagefile) {
                        $extention = $imagefile->getClientOriginalExtension();
                        $filename = time() . $i++ . '.' . $extention;
                        $imagefile->move($uploadPath, $filename);
                        $finalImagePathName = $uploadPath . $filename;
                        $product->productImages()->create([
                            'product_id' => $product->id,
                            'image' => $finalImagePathName,
                        ]);
                    }
                }


                // if (!empty($request->image)) {
                //     foreach ($request->image as $images) {
                //         $images->storeAs(
                //             'Products-Images/',
                //             $product->id . '/' . $images->getClientOriginalName(),  //Create Folder By Name Product  //get Original name Photo //Creunt Name
                //             'Products-Images',
                //         );
                //         //get Id from  ProductImages Realashionship
                //         $product->ProductImages()->create([
                //             'image' => $images->getClientOriginalName(),
                //             'product_id' => $product->id,
                //         ]);
                //     }
                // }
            } else {
                toastr()->success('No Such Product Id Found!');
                return redirect()->back();
            }


            toastr()->success('Data has been saved successfully!');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('product.index');
        }
    }

    public function deleteImageProduct($id)
    {
        try {
            $productImage = ProductImage::findOrFail($id);
            // Check if the image file exists and delete it
            if (File::exists($productImage->image)) {
                File::delete($productImage->image);
            }
            //Storage::disk('public')->delete('Products-Images/' . $request->Product_Id . '/' . $productImage->image);
            // Delete the record from database
            $productImage->delete();
            toastr()->success('Image has been deleted successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('An error occurred while deleting the image: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            // Check if the image file exists and delete it
            if ($product->ProductImages) {
                foreach ($product->ProductImages as $image) {
                    if (File::exists($image->image)) {
                        File::delete($image->image);
                    }
                }
            }
            // Delete the record from database
            $product->delete();
            toastr()->success('Product has been deleted successfully with all images!');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('An error occurred while deleting the image: ' . $e->getMessage());
        }
    }

    public function updateProductColorQuantity($request, $prod_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
            ->productColors()->where('id',  $prod_color_id)->first();
        $productColorData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Product Color Quantitiy is Updated successfully']);
    }

    public function deleteProductColorQuantity($prod_color_id)
    {
        $productColorDeleteData = ProductColor::findOrFail($prod_color_id);
        $productColorDeleteData->delete();
        return response()->json(['message' => 'Color and Quantitiy is Deleted successfully']);
    }
}
