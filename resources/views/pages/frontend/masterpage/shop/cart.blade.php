@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    Cart
@endsection

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area commun_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Cart</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--wishlist area start -->
    <livewire:frontend.cart.cart-details />
    <!--wishlist area end -->
@endsection

@section('js')
@endsection
