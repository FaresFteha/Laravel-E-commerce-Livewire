<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories'] = category::withCount('products')
            ->whereStatus(1)
            ->get();

        $data['totalProducts'] = Product::count();
        $data['totalCategories'] = category::count();
        $data['totalBrands'] = brand::count();

        $data['totalAllUsers'] = User::count();
        $data['totalAdmin'] = User::where('role_as',  '1')->count();
        $data['totalUser '] = User::where('role_as',  '0')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $data['totalOrder'] = Order::count();
        $data['todayOrder'] = Order::whereDate('created_at', $todayDate)->count();
        $data['thisMonthOrder'] = Order::whereMonth('created_at', $thisMonth)->count();
        $data['thisYear0rder'] = Order::whereYear('created_at', $thisYear)->count();

        return view('pages.index', $data);
    }
}
