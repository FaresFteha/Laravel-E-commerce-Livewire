@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    Thank-You
@endsection

@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif
                    <h2><img src="{{ asset('asset/frontend/assets/img/logo/logo.png') }}"></h2>
                    <h4>Thank You for Shopping with CIGAR-Ecommerce </h4>
                    <a href="{{ route('shop') }}" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
