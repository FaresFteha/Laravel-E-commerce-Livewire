<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title')</title>

<meta name="description" content="@yield('meta_description')">
<meta name="keywords" content="@yield('meta_keyowrd')">
<meta name="author" content="Fares Fteha">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<!-- all css here -->
<link rel="stylesheet" href="{{ asset('asset/frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/frontend/assets/css/bundle.css') }}">
<link rel="stylesheet" href="{{ asset('asset/frontend/assets/css/plugins.css') }}">
<link rel="stylesheet" href="{{ asset('asset/frontend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('asset/frontend/assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('asset/frontend/assets/exzoom/jquery.exzoom.css') }}">
<script src="{{ asset('asset/frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

@yield('css')
@livewireStyles
