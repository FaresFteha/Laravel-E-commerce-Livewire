<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $CartCount;

    //wishlistAddedUpdated
    protected $listeners = ['CartAddedUpdated' => 'checkCartCount'];

    public function checkCartCount()
    {
        if (Auth::check()) {
            return $this->CartCount = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            return $this->CartCount = 0;
        }
    }
    public function render()
    {
        $this->CartCount = $this->checkCartCount();
        return view('livewire.frontend.cart.cart-count' ,
        [
            'CartCount' => $this->CartCount
        ]
    );
    }
}
