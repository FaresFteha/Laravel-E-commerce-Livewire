@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    My-account
@endsection

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area commun_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>my account</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>my account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                  this.closest('form').submit();">Logout</a>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your <a
                                        href="#">recent orders</a>, manage your <a href="#">shipping and billing
                                        addresses</a> and <a href="#">Edit your password and account details.</a></p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="coron_table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tracking No</th>
                                                <th>User Name</th>
                                                <th>Payment Mode</th>
                                                <th>Orderd Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $items)
                                                <tr>
                                                    <td>{{ $items->tracking_no }}</td>
                                                    <td>{{ $items->fullname }}</td>
                                                    <td>{{ $items->payment_mode }}</td>
                                                    <td>{{ $items->created_at->format('d-m-y') }}</td>
                                                    <td>{{ $items->status_message }}</td>
                                                    <td><a href="{{ route('frontend.order.show', $items->id) }}"
                                                            class="view">view</a></td>
                                                </tr>
                                            @empty
                                                <tr colspan="7">
                                                    No Orders available.
                                                </tr>
                                            @endforelse


                                        </tbody>
                                    </table>
                                    {{ $orders->links() }}
                                </div>
                            </div>


                            <div class="tab-pane fade" id="account-details">
                                <h3>Account details </h3>
                                <a href="{{ route('user.changePassword') }}" class="btn btn-warning float-end">Cahnge
                                    Password?</a>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="{{ route('UpdateUser') }}" method="POST">
                                                @csrf
                                                @method('POST')

                                                <label>User Name</label>
                                                <input type="text" value="{{ Auth::user()->name }}" name="username">
                                                <label>Email Address</label>
                                                <input type="email" value="{{ Auth::user()->email }}" name="email">
                                                <label>Phone Number</label>
                                                <input type="text" value="{{ Auth::user()->userDetail->phone }}"
                                                    name="phone">
                                                <label>Address</label>
                                                <input type="text" value="{{ Auth::user()->userDetail->address }}"
                                                    name="address">
                                                <label>Zip/Pin Code</label>
                                                <input type="text" value="{{ Auth::user()->userDetail->pincode }}"
                                                    name="pincode">

                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account end   -->
@endsection
@section('js')
@endsection
