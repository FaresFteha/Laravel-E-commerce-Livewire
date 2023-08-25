@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    Ecommerce | Tech
@endsection
@section('content')
    <!--slider area start-->
    <div class="slider_area owl-carousel">
        @include('pages.frontend.pages.sliders.slider')
    </div>
    <!--slider area end-->
    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="shipping_inner">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <span class="pe-7s-piggy"></span>
                            </div>
                            <div class="shipping_content">
                                <h3>Free Shipping Worldwide</h3>
                                <p>Diam augue augue in fusce voluptatem</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <span class="pe-7s-rocket"></span>
                            </div>
                            <div class="shipping_content">
                                <h3>Free Shipping Worldwide</h3>
                                <p>Diam augue augue in fusce voluptatem</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_shipping column_3">
                            <div class="shipping_icone">
                                <span class="pe-7s-help2"></span>
                            </div>
                            <div class="shipping_content">
                                <h3>Free Shipping Worldwide</h3>
                                <p>Diam augue augue in fusce voluptatem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shipping area end-->
    <!--categories banner start-->
    @include('pages.frontend.pages.categories.category')
    <!--categories banner end-->
    <!--banner area start-->
    <div class="banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('asset/frontend/assets/img/banner/banner5.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-12">
                            <div class="single_banner">
                                <div class="banner_thumb">
                                    <a href="#"><img src="{{ asset('asset/frontend/assets/img/banner/banner6.png') }}"
                                            alt=""></a>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="single_banner">
                                <div class="banner_thumb">
                                    <a href="#"><img src="{{ asset('asset/frontend/assets/img/banner/banner7.png') }}"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="single_banner">
                                <div class="banner_thumb">
                                    <a href="#"><img src="{{ asset('asset/frontend/assets/img/banner/banner8.png') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="single_banner">
                                <div class="banner_thumb">
                                    <a href="#"><img src="{{ asset('asset/frontend/assets/img/banner/banner9.png') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    @include('pages.frontend.pages.produtc_area.produtc_area')
    <!--product area end-->

    <!--discount banner srart-->
    <div class="discount_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="discount_banner_thumb">
                        <a href="#"><img src="{{ asset('asset/frontend/assets/img/banner/bgbanner.jpg') }}"
                                alt="">

                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--discount banner end-->

    <!--consoles product start-->

    @include('pages.frontend.pages.product_with_category.productcategory')
    <!--consoles product end-->

    <!--home banner sction start-->
    <div class="home_banner_sction">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('asset/frontend/assets/img/banner/bgbanner3.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('asset/frontend/assets/img/banner/bgbanner4.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--home banner sction end-->





    <!--custom product start-->

    @include('pages.frontend.pages.fullsection.fullsection')
    <!--brand area end-->

    <!--brand area start-->
    <div class="brand_area">
        <div class="container">
            <div class="brand_inner">
                <div class="row">
                    <div class="brand_active owl-carousel">
                        <div class="col-lg-3">
                            <div class="single_brand">
                                <a href="#"><img src="{{ asset('asset/frontend/assets/img/brand/bra1.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="single_brand">
                                <a href="#"><img src="{{ asset('asset/frontend/assets/img/brand/bra2.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="single_brand">
                                <a href="#"><img src="{{ asset('asset/frontend/assets/img/brand/bra3.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="single_brand">
                                <a href="#"><img src="{{ asset('asset/frontend/assets/img/brand/bra4.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="single_brand">
                                <a href="#"><img src="{{ asset('asset/frontend/assets/img/brand/bra5.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="single_brand">
                                <a href="#"><img src="{{ asset('asset/frontend/assets/img/brand/bra6.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
