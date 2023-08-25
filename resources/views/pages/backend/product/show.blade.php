@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-Product-show
@endsection


@section('contnet')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Show Product</h5>
                </div>
            </div>
        </div>

        <div class="card-body bg-light">
            <div class="tab-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home"
                            role="tab" aria-controls="tab-home" aria-selected="true">Home</a></li>

                    <li class="nav-item"><a class="nav-link" id="SEO-tab" data-bs-toggle="tab" href="#tab-profile"
                            role="tab" aria-controls="tab-profile" aria-selected="false">SEO Tags</a></li>

                    <li class="nav-item"><a class="nav-link" id="Details-tab" data-bs-toggle="tab" href="#tab-contact"
                            role="tab" aria-controls="tab-contact" aria-selected="false">Details</a></li>

                    <li class="nav-item"><a class="nav-link" id="pill-contact-tab" data-bs-toggle="tab"
                            href="#pill-tab-contact" role="tab" aria-controls="pill-tab-contact"
                            aria-selected="false">Images</a></li>

                    <li class="nav-item"><a class="nav-link" id="pill-contact-tab" data-bs-toggle="tab"
                            href="#pill-tab-color" role="tab" aria-controls="pill-tab-color"
                            aria-selected="false">Colors</a></li>

                </ul>
                <div class="tab-content border-x border-bottom p-3" id="myTabContent">

                    {{-- Home Detai --}}
                    <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="mb-0">Public Product Details</h5>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body bg-light border-top">
                                <div class="row">
                                    <div class="col-lg col-xxl-5">
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Product Name</p>
                                            </div>
                                            <div class="col">{{ $product->name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Product Slug</p>
                                            </div>
                                            <div class="col">{{ $product->slug }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Category</p>
                                            </div>
                                            <div class="col">{{ $product->Category->name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Description</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-1">{{ $product->description }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-0">Small Description</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0">{{ $product->small_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- SEO Tags --}}
                    <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="SEO-tab">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="mb-0">Product SEO Tags</h5>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body bg-light border-top">
                                <div class="row">
                                    <div class="col-lg col-xxl-5">
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Meta Title</p>
                                            </div>
                                            <div class="col">{{ $product->meta_title }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Meta Keywoed</p>
                                            </div>
                                            <div class="col">{{ $product->meta_keywoed }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Meta Description</p>
                                            </div>
                                            <div class="col">{{ $product->meta_description }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Details Tags --}}
                    <div class="tab-pane fade" id="tab-contact" role="tabpanel" aria-labelledby="Details-tab">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="mb-0">Product SEO Tags</h5>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body bg-light border-top">
                                <div class="row">
                                    <div class="col-lg col-xxl-5">
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Orginal Price</p>
                                            </div>
                                            <div class="col">{{ $product->orginal_price }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Selling Price</p>
                                            </div>
                                            <div class="col">{{ $product->selling_price }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Quantity</p>
                                            </div>
                                            <div class="col">{{ $product->quantity }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-1">Trending</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-1">
                                                    @if ($product->trending)
                                                        <span style="color: green">{{ $product->Trending() }}</span>
                                                    @else
                                                        <span style="color: red">{{ $product->Trending() }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-sm-4">
                                                <p class="fw-semi-bold mb-0">Status</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0">
                                                    @if ($product->status)
                                                        <span style="color: green">{{ $product->Status() }}</span>
                                                    @else
                                                        <span style="color: red">{{ $product->Status() }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Images Tags --}}
                    <div class="tab-pane fade" id="pill-tab-contact" role="tabpanel" aria-labelledby="contact-tab">
                        @if ($product->ProductImages)
                            <div class="row">
                                @foreach ($product->ProductImages as $item)
                                    <div class="col-md-2">
                                        <img src="{{ asset($item->image) }}" style="width:150px; height:150px;"
                                            class="me-4 border" alt="Img">

                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h4>No Image Added</h4>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="pill-tab-color" role="tabpanel" aria-labelledby="contact-tab">

                        <div class="table-responsive">
                            <table class="table table-bordered" style="border: 1px solid #c4c4c4">
                                <thead>
                                    <tr>
                                        <th>Color Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $procolor)
                                        <tr class="prod-color-tr">
                                            <td>{{ $procolor->color->name ?? 'Non Color Found' }}</td>
                                            <td>
                                                <div class="mb-3" style="width: 150px">
                                                    <span>{{ $procolor->quantity }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
