<?php

namespace App\Http\Livewire\Frontend\ProductShop;

use App\Models\Cart;
use App\Models\brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\category;
use App\Models\Wishlist;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Shop extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $brandsList = [], $priceInput, $sortBy = 'asc',  $paginate = '5', $search;

    protected $queryString = [
        'brandsList' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];




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
            toastr()->error('You are not login please login to continue!');
            return false;
        }
    }


    // Add To Cart
    public function addToCart($productId)
    {
        if (Auth::check()) {
            // Check if the product is already added to the cart
            if (Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists()) {
                toastr()->info('Product Already Added');
            } else {
                // Check Cart Product Quantity Availability
                $product = Product::find($productId);
                if ($product && $product->status == 1) {
                    if ($product->quantity > 0) {
                        // Insert Product in Cart
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,
                            'quantity' => '1',
                        ]);
                        $this->emit('CartAddedUpdated');
                        toastr()->success('Product Added To Cart!');
                    } else {
                        toastr()->error('No Quantity Available');
                    }
                } else {
                    toastr()->error('Product Does Not Exist or is Inactive');
                }
            }
        } else {
            toastr()->info('You are not logged in. Please log in to continue!');
            return false;
        }
    }



    public function render()
    {

        $brand = brand::where('status', '1')->get();

        $products = Product::where('status', '1')
            //Fillter  Brand
            ->when($this->brandsList, function ($query) {
                $query->whereIn('brand', $this->brandsList);
            })
            //Fillter  Price
            ->when($this->priceInput, function ($q) {
                //Fillter  Price high-to-low
                $q->when($this->priceInput == 'high-to-low', function ($q2) {
                    $q2->orderBy('selling_price', 'DESC');
                })
                    //Fillter  Price low-to-high
                    ->when($this->priceInput == 'low-to-high', function ($q2) {
                        $q2->orderBy('selling_price', 'ASC');
                    });
            })
            //Search
            ->search(trim($this->search))
            //Sort by
            ->orderBy('selling_price', $this->sortBy)
            ->paginate($this->paginate);

        return view(
            'livewire.frontend.product-shop.shop',
            ['products' => $products, 'brand' => $brand]
        );
    }
}
