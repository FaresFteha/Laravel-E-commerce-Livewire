@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    Orders Details-{{ $order->tracking_no }}
@endsection

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <div class="breadcrumb_content">
                            <h3>Orders Details {{ $order->tracking_no }}</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Tracking Id/No.: {{ $order->tracking_no }} </h6>
                                <h6>Order Created Date: {{ $order->created_at->format('d-m-y') }}</h6>
                                <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                                <h6 class="porder p-2 text-success">Order Status Message: <span class="text-uppercase">
                                        {{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Full Name: {{ $order->fullname }}</h6>
                                <h6>Email Id: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phone }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pin code: {{ $order->pincode }}</h6>
                            </div>
                        </div>
                        <br />
                        <h5>Order Items</h5>
                        <hr>
                        <div class="coron_table table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Imge</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantitiy</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @forelse ($order->orderItems as $orderItems)
                                        <tr>
                                            <td width="10%">
                                                @if ($orderItems->product->ProductImages)
                                                    <img src="{{ asset($orderItems->product->ProductImages[0]->image) }}"
                                                        style="width: 50px; height:50px" alt="">
                                                @else
                                                    <img src="" style="width: 50px; height:50px" alt="">
                                                @endif
                                            </td>

                                            <td>{{ $orderItems->product->name }}
                                                @if ($orderItems->productColor)
                                                    @if ($orderItems->productColor->color)
                                                        <span>- Color {{ $orderItems->productColor->color->name }}</span>
                                                    @else
                                                    @endif
                                                @endif
                                            </td>

                                            <td width="10%">${{ $orderItems->price }}</td>
                                            <td width="10%">{{ $orderItems->quantity }}</td>
                                            <td width="10%" class="fw-blod">
                                                ${{ $orderItems->quantity * $orderItems->price }}</td>
                                            @php
                                                $totalPrice += $orderItems->quantity * $orderItems->price;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr colspan="5">
                                            No Order Items available.
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="4"class="fw-blod">Total Amount: </td>
                                        <td colspan="2" class="fw-blod">${{ $totalPrice }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- my account end   -->
@endsection
@section('js')
@endsection
