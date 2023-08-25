@extends('layouts.frontend.index')
@section('css')
@endsection
@section('title')
    {{ $categorySlug->meta_title }}
@endsection
@section('meta_keyowrd')
    {{ $categorySlug->meta_keywoed }}
@endsection
@section('meta_description')
    {{ $categorySlug->meta_description }}
@endsection
@section('content')
    <!--shop wrapper end-->
    <livewire:frontend.product-collection.collection :categorySlug="$categorySlug" />

    <!-- modal area start-->
    {{--    
    <div class="modal fade" id="modal_box{{ $productItem->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#">
                                                    @if ($productItem->ProductImages->count() > 0)
                                                        <a href="product-details.html"><img
                                                                src="{{ asset($productItem->ProductImages[0]->image) }}"
                                                                alt="{{ $productItem->name }}"></ a>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product46.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product47.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            @foreach ($productItem->ProductImages as $images)
                                                <li>
                                                    <a class="nav-link active" data-toggle="tab" href="#tab1"
                                                        role="tab" aria-controls="tab1" aria-selected="false"><img
                                                            src="{{ asset($images->image) }}" alt=""></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>{{ $productItem->name }}</h2>
                                    </div>

                                    <div class="modal_price mb-10">
                                        <span class="new_price">${{ $productItem->selling_price }}</span>
                                        <span class="old_price">${{ $productItem->orginal_price }}</span>
                                    </div>
                                    <div class="modal_content mb-10">
                                        <p>{{ $productItem->small_description }}</p>
                                    </div>
                                    <div class="modal_size mb-15">
                                        <h2>{{ $productItem->brand }}</h2>
                                    </div>
                                    <div class="modal_add_to_cart mb-15">
                                        <form action="#">
                                            <input min="1" max="100" step="2" value="1"
                                                type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>
                                            {{ $productItem->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- modal area start-->
@endsection
@section('js')
@endsection
