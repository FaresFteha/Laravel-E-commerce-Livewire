<?php

namespace App\Http\Livewire\Frontend\WishList;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListCount extends Component
{
    public $wishlistCount;

    //wishlistAddedUpdated
    protected $listeners = ['wishlistAddedUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if (Auth::check()) {
            return $this->wishlistCount = Wishlist::where('user_id', Auth::user()->id)->count();
        } else {
            return $this->wishlistCount = 0;
        }
    }
    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.frontend.wish-list.wish-list-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
