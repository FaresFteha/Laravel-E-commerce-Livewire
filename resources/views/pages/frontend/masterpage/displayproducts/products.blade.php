@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    {{ $product->meta_title }}
@endsection
@section('meta_keyowrd')
    {{ $product->meta_keywoed }}
@endsection
@section('meta_description')
    {{ $product->meta_description }}
@endsection
@section('content')
    <!--single product wrapper start-->
    <livewire:frontend.product-detail.index :category="$category" :product="$product" />

    <!--single product wrapper end-->
@endsection
@section('js')
@endsection
