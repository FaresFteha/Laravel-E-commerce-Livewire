<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class HomeController extends Controller
{
    //
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function index()
    {
        $CategoriesIndex = category::where('status', '1')->get();

        $products = Product::where('status', '1')
            ->latest()
            ->take(10)->get();

        $trendingProduct = Product::where('trending', '1')->latest()
            ->take(10)
            ->get();

        $featurProduct = Product::where('featured', '1')->latest()
            ->take(3)
            ->get();

        $categoryRandom = category::inRandomOrder()->first();
        $ProductCategory = Product::where('category_id', $categoryRandom->id)
            ->where('status', '1')
            ->latest()
            ->take(10)
            ->get();

        $RecentProduct = Product::where('status', '1')
            ->latest()
            ->take(10)
            ->get();

        $RandomProducts = Product::where('status', '1')
            ->inRandomOrder()
            ->latest()
            ->take(10)
            ->get();

        return view('pages.frontend.masterpage.index', compact('CategoriesIndex', 'products', 'trendingProduct', 'featurProduct', 'ProductCategory', 'categoryRandom', 'RecentProduct', 'RandomProducts'));
    }

    public function productsOfSlug($productsOfSlug)
    {
        $categorySlug = category::where('slug', $productsOfSlug)->first();
        if ($categorySlug) {
            return view('pages.frontend.masterpage.collections.category', compact('categorySlug'));
        } else {
            return redirect()->back();
        }
    }
    public function shop()
    {

        return view('pages.frontend.masterpage.shop.shop');
    }

    public function productView(string $category_slug, string $product_slug)
    {

        $category = category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '1')->first();
            if ($product) {
                return view('pages.frontend.masterpage.displayproducts.products', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function searchProduct(Request $request)
    {
        if ($request->search) {
            $searchProduct = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
            return view('pages.frontend.masterpage.search.search', compact('searchProduct'));
        } else {
            return redirect()->back();
        }
    }
}
