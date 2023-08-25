<?php

namespace App\Http\Livewire\Frontend\WishList;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public function deleteWishList($wishlistId)
    {
        Wishlist::where('user_id', Auth::user()->id)
            ->where('id', $wishlistId)->delete();
            $this->emit('wishlistAddedUpdated');
        toastr()->success('Removed Item from wishlist successfuly!');
    }
    public function render()
    {
        $wishList = Wishlist::where('user_id', Auth()->user()->id)->get();
        return view('livewire.frontend.wish-list.index', ['wishList' => $wishList]);
    }
}
