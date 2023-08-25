<?php

namespace App\Http\Livewire\Frontend\ProductCollection;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Collection extends Component
{

    public $products,  $categorySlug;

    public function mount($categorySlug)
    {
        $this->categorySlug = $categorySlug;
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
    
    public function render()
    {
        $this->products = Product::where('category_id', $this->categorySlug->id)
            ->where('status', '1')->get();
        return view('livewire.frontend.product-collection.collection', [
            'products' => $this->products,
            'categorySlug' => $this->categorySlug,
        ]);
    }
}
