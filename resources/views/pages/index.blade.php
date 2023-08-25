@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel - E-commerce
@endsection


@section('contnet')
    <div class="row g-3 mb-3">
        @if (session('message'))
            <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
                <p class="mb-0 flex-1">{{ session('message') }}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-xxl-6 col-xl-12">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card bg-transparent-50 overflow-hidden">
                        <div class="card-header position-relative">
                            <div class="bg-holder d-none d-md-block bg-card z-index-1"
                                style="background-image:url({{ asset('asset/backend/src/img/illustrations/ecommerce-bg.png') }});background-size:230px;background-position:right bottom;z-index:-1;">
                            </div>
                            <!--/.bg-holder-->

                            <div class="position-relative z-index-2">
                                <div>
                                    <h3 class="text-primary mb-1">Your Welcome, {{ Auth::user()->name }}!</h3>
                                    <p>Here’s what happening with your store today </p>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="pe-3">
                                        <p class="text-600 fs--1 fw-medium">Today's visit </p>
                                        <h4 class="text-800 mb-0">14,209</h4>
                                    </div>
                                    <div class="ps-3">
                                        <p class="text-600 fs--1">Today’s total sales </p>
                                        <h4 class="text-800 mb-0">$21,349.29 </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="mb-0 list-unstyled">
                                <li class="alert mb-0 rounded-0 py-3 px-card alert-warning border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs--2"></div>
                                                <p class="fs--1 ps-2 mb-0"><strong>5 products</strong> didn’t publish to
                                                    your Facebook page</p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center"><a
                                                class="alert-link fs--1 fw-medium" href="#!">View products<i
                                                    class="fas fa-chevron-right ms-1 fs--2"></i></a></div>
                                    </div>
                                </li>
                                <li
                                    class="alert mb-0 rounded-0 py-3 px-card greetings-item border-top border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs--2 text-primary"></div>
                                                <p class="fs--1 ps-2 mb-0"><strong>7 orders</strong> have payments that need
                                                    to be captured</p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center"><a
                                                class="alert-link fs--1 fw-medium" href="#!">View payments<i
                                                    class="fas fa-chevron-right ms-1 fs--2"></i></a></div>
                                    </div>
                                </li>
                                <li class="alert mb-0 rounded-0 py-3 px-card greetings-item border-top  border-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs--2 text-primary"></div>
                                                <p class="fs--1 ps-2 mb-0"><strong>50+ orders</strong> need to be fulfilled
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center"><a
                                                class="alert-link fs--1 fw-medium" href="#!">View orders<i
                                                    class="fas fa-chevron-right ms-1 fs--2"></i></a></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xxl-6 col-xl-12">
        <div class="card py-3 mb-3">
            <div class="card-body py-3">
                <div class="row g-0">
                    <div class="col-6 col-md-4 border-200 border-bottom border-end pb-4">
                        <h6 class="pb-1 text-700">Total Orders </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $totalOrder ?? '0' }}</p>
                        <div class="d-flex align-items-center">

                            <h6 class="fs--1  mb-0 text-bold"></span>Year Orders: <strong>{{ $todayOrder ?? '0' }}</strong>
                            </h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1  mb-0 text-bold">Month Orders:<strong>{{ $thisMonthOrder ?? '0' }}</strong>
                            </h6>
                        </div>
                        <div class="d-flex align-items-center">

                            <h6 class="fs--1  mb-0 text-bold"></span>Year Orders:
                                <strong>{{ $thisYear0rder ?? '0' }}</strong>
                            </h6>
                        </div>

                    </div>
                    <div class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-end pb-4 ps-3">
                        <h6 class="pb-1 text-700">TotalUser </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $totalAllUsers ?? 0 }}</p>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1  mb-0 text-bold"></span>Year Orders:
                                <strong>{{ $totalAdmin ?? '0' }}</strong>
                            </h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1  mb-0 text-bold"></span>Year Orders:
                                <strong>{{ $totalUser ?? '0' }}</strong>
                            </h6>
                        </div>
                    </div>
                    <div
                        class="col-6 col-md-4 border-200 border-bottom border-end border-md-end-0 pb-4 pt-4 pt-md-0 ps-md-3">
                        <h6 class="pb-1 text-700">Product </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $totalProducts ?? '0' }}</p>
                    </div>
                    <div
                        class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-bottom-0 border-md-end pt-4 pb-md-0 ps-3 ps-md-0">
                        <h6 class="pb-1 text-700">Gategory</h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $totalCategories ?? '0' }}</p>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-md-bottom-0 border-end pt-4 pb-md-0 ps-md-3">
                        <h6 class="pb-1 text-700">Brand </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $totalBrands ?? '0' }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive scrollbar">
                        <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                            <thead class="bg-light">
                                <tr class="text-900">
                                    <th>Stock</th>
                                    <th class="text-center">Quantity Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $items)
                                    <tr class="border-bottom border-200">
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                @if ($items->photo)
                                                    <img class="rounded-1 border border-200"
                                                        src="{{ asset('storage/Attachments/Category-Attachments/' . $items->photo) }}"
                                                        width="60" alt="" />
                                                @else
                                                    <img class="rounded-1 border border-200"
                                                        src="{{ asset('asset/backend/src/img/ecommerce/1.jpg') }}"
                                                        width="60" alt="" />
                                                @endif
                                                <div class="flex-1 ms-3">
                                                    <h6 class="mb-1 fw-semi-bold text-nowrap"><a
                                                            class="text-900 stretched-link"
                                                            href="#!">{{ $items->name }}</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center fw-semi-bold">{{ $items->products->count() }}
                                        </td>

                                    </tr>
                                @empty
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
