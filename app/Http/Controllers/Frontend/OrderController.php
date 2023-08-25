<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class OrderController extends Controller
{
    //
    use WithPagination;
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(3);
        return view('pages.frontend.masterpage.myaccount.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('user_id', Auth::user()->id)->findOrFail($id);
        if ($order) {
            return view('pages.frontend.masterpage.myaccount.show', compact('order'));
        } else {
            toastr()->error('Something Went Wrong!');
        }
    }
}
