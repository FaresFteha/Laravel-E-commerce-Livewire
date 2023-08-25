<div class="produtc_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_tab_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#Products" role="tab" aria-controls="Products"
                                aria-selected="true"> New Products</a>
                        </li>
                        {{-- <li>
                            <a data-toggle="tab" href="#OnSale" role="tab" aria-controls="OnSale"
                                aria-selected="false"> OnSale</a>
                        </li> --}}
                        <li>
                            <a data-toggle="tab" href="#Feature" role="tab" aria-controls="Feature"
                                aria-selected="false"> Feature Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="Products" role="tabpanel">
                <div class="row">
                    <div class="product_active owl-carousel">
                        @forelse ($products as $productItem)
                            <div class="col-lg-3">
                                <div class="single_product">

                                    <div class="product_thumb">
                                        @if ($productItem->ProductImages->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"><img
                                                    src="{{ asset($productItem->ProductImages[0]->image) }}"
                                                    alt="{{ $productItem->name }}"></a>
                                        @endif
                                    </div>
                                    <div class="product_content">
                                        <div class="product_ratting">
                                            @if ($productItem->quantity > 0)
                                                <span class="badge badge-success">In Stock</span>
                                            @else
                                                <span class="badge badge-danger">Out of Stock</span>
                                            @endif

                                        </div>
                                        <h3><a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">{{ $productItem->name }}</a>
                                        </h3>
                                        <div class="product_price">
                                            <span class="current_price">{{ $productItem->selling_price }}$</span>
                                            <span
                                                class="old_price"><del>{{ $productItem->orginal_price }}</del>$</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="p-2">
                                    <h4>No Product Available for {{-- $categorySlug->name --}}</h4>
                                </div>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="Feature" role="tabpanel">
                <div class="row">
                    <div class="product_active owl-carousel">
                        @forelse ($featurProduct as $productItem)
                            <div class="col-lg-3">
                                <div class="single_product">

                                    <div class="product_thumb">
                                        @if ($productItem->ProductImages->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"><img
                                                    src="{{ asset($productItem->ProductImages[0]->image) }}"
                                                    alt="{{ $productItem->name }}"></a>
                                        @endif
                                    </div>
                                    <div class="product_content">
                                        <div class="product_ratting">
                                            @if ($productItem->quantity > 0)
                                                <span class="badge badge-success">In Stock</span>
                                            @else
                                                <span class="badge badge-danger">Out of Stock</span>
                                            @endif

                                        </div>
                                        <h3><a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">{{ $productItem->name }}</a>
                                        </h3>
                                        <div class="product_price">
                                            <span class="current_price">{{ $productItem->selling_price }}$</span>
                                            <span
                                                class="old_price"><del>{{ $productItem->orginal_price }}</del>$</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="p-2">
                                    <h4>No Product Available for {{-- $categorySlug->name --}}</h4>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>