<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartDetails extends Component
{
    public $cart, $subTotal =  0, $totalAmount = 30;

    public function decrementQuantity($cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->quantity > 1) {
                $cartData->decrement('quantity');
                toastr()->success('Quantity Updated successfuly!');
            } else {
                toastr()->error('Quantity cannot be less than 1!');
            }
        } else {
            toastr()->error('Something Went Wrong!');
        }
    }
    public function incrementQuantity($cartId)
    {
        $cartData =  Cart::where('user_id', Auth::user()->id)->where('id', $cartId)->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity) {
                    $cartData->increment('quantity');
                    toastr()->success('Quantity Updated successfuly!');
                } else {
                    toastr()->error('Only ' . $productColor->quantity . ' Quantity Available');
                }
            } else {
                if ($cartData->product->quantity >  $cartData->quantity) {
                    $cartData->increment('quantity');
                    toastr()->success('Quantity Updated successfuly!');
                } else {
                    toastr()->error('Only ' . $cartData->product->quantity . ' Quantity Available');
                }
            }
        } else {
            toastr()->error('Something Went Wrong!');
        }
    }
    public function deleteCart($CartId)
    {
        $cartDeleteItem = Cart::where('user_id', Auth::user()->id)
            ->where('id', $CartId)->first();
        if ($cartDeleteItem) {
            $cartDeleteItem->delete();
            $this->emit('CartAddedUpdated');
            toastr()->success('Removed Item from Cart successfuly!');
        } else {
            toastr()->success('Something Went Wrong!');
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', Auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-details', ['Cart' => $this->cart]);
    }
}
