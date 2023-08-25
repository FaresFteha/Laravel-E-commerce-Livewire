@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    WishList
@endsection

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area commun_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>wishlist</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--wishlist area start -->
    <livewire:frontend.wish-list.index />
    <!--wishlist area end -->
@endsection

@section('js')
@endsection
