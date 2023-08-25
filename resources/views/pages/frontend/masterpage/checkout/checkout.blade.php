@extends('layouts.frontend.index')
@section('css')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .checkout .form-control {
            border-radius: 0px !important;
        }

        .checkout .form-control:focus {
            border: 1px solid #000 !important;
            box-shadow: none !important;
        }

        .checkout .nav-link {
            border: 1px solid #000;
            border-radius: 0px;
            margin-bottom: 8px;
        }

        .checkout .tab-content {
            padding-right: 10px;
        }
    </style>
@endsection
@section('title')
    Checkout
@endsection
@section('content')
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>
            <livewire:frontend.cart.checkout />
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
