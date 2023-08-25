<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $category, $product, $productColorSelecteQuantity, $productColorId, $quantityCount = 1;


    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelecteQuantity = $productColor->quantity;
        if ($this->productColorSelecteQuantity == 0) {
            $this->productColorSelecteQuantity = 'outofStock';
        }
    }


    public function addTOWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists()) {
                toastr()->error('Already added to wishlist!');
            } else {
                Wishlist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('wishlistAddedUpdated');
                toastr()->success('Added to wishlist successfuly!');
            }
        } else {
            toastr()->info('You are not login please login to continue!');
            return false;
        }
    }

    //Add To Cart
    public function addToCart($productId)
    {
        if (Auth::check()) {
            //Check Cart Product Color Quantity Avaliablity
            if ($this->product->productColors()->count() > 1) {
                if ($this->productColorSelecteQuantity != null) {
                    if (Cart::where('user_id', Auth::user()->id)
                        ->where('product_color_id', $this->productColorId)
                        ->exists()
                    ) {

                        toastr()->info('Product Already Added');
                    } else {
                        $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                        if ($productColor->quantity > 0) {
                            if ($productColor->quantity  > $this->quantityCount) {
                                //Insert Product in Cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'product_color_id' => $this->productColorId,
                                    'quantity' => $this->quantityCount,
                                ]);
                                $this->emit('CartAddedUpdated');
                                toastr()->success('Product Add To Cart!');
                            } else {
                                toastr()->error('Only ' . $productColor->quantity . ' Quantity Available');
                            }
                        } else {
                            toastr()->error('Product Out Of Stock!');
                        }
                    }
                } else {
                    toastr()->error('Select Your Product Color!');
                }
            } else {
                if (Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists()) {
                    toastr()->info('Product Already Added');
                } else {
                    //Check Cart Product Quantity Avaliablity
                    if ($this->product->where('id', $productId)->where('status', '1')->exists()) {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity  > $this->quantityCount) {
                                //Insert Product in Cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);
                                $this->emit('CartAddedUpdated');
                                toastr()->success('Product Add To Cart!');
                            } else {
                                toastr()->error('Only' . $this->product->quantity . 'Quantity Available');
                            }
                        } else {
                            toastr()->error('Product Out Of Stock!');
                        }
                    } else {
                        toastr()->error('Product Does not exists!');
                    }
                }
            }
        } else {
            toastr()->info('You are not login please login to continue!');
            return false;
        }
    }


    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decincrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view(
            'livewire.frontend.product-detail.index',
            [
                'category' => $this->category,
                'product' => $this->product,
            ]
        );
    }
}
