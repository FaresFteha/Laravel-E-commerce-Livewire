@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    Products
@endsection
@section('meta_keyowrd')
@endsection
@section('meta_description')
@endsection
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="breadcrumbs_inner">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <h3>shop</h3>
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li>shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop wrapper start-->
    <div class="shop_wrapper">
        <div class="container">
            <livewire:frontend.product-shop.shop />
        </div>
    </div>
    <!--shop wrapper end-->
@endsection
@section('js')
@endsection
