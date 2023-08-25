<div class="custom_product">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="custom_product_wrapper">
                    <div class="custom_product_title">
                        <h3>recent product</h3>
                    </div>
                    <div class="custom_product_active owl-carousel">
                        <div class="custom_product_list">
                            @forelse ($RecentProduct as $productItem)
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
            <div class="col-lg-4 col-md-6">
                <div class="custom_product_wrapper">
                    <div class="custom_product_title">
                        <h3>random products</h3>
                    </div>
                    <div class="custom_product_active owl-carousel">
                        <div class="custom_product_list">
                            @forelse ($RandomProducts as $productItem)
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
            <div class="col-lg-4 col-md-6">
                <div class="custom_product_wrapper">
                    <div class="custom_product_title">
                        <h3>featured products </h3>
                    </div>
                    <div class="custom_product_active owl-carousel">
                        <div class="custom_product_list">
                            @forelse ($featurProduct as $productItem)
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
    <!--custom product end-->

   
</div>