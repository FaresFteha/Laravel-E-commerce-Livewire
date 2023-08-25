<div class="consoles_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="consoles_header">
                    <div class="consoles_product_title">
                        <h3>Category With Product ({{ $categoryRandom->name }})</h3>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="{{ route('collections.categoriesSlug', $categoryRandom->slug) }}"><img
                                src="{{ asset('storage/Attachments/Category-Attachments/' . $categoryRandom->photo) }}"
                                alt=""></a>
                        <div class="categorie_banner_content">

                            <ul>
                                <h3>
                                    <li> <a
                                            href="{{ route('collections.categoriesSlug', $categoryRandom->slug) }}">{{ $categoryRandom->name }}</a>
                                    </li>
                                </h3>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="digital" role="tabpanel">
                        <div class="row">
                            <div class="consoles_product_active owl-carousel">
                                @forelse ($ProductCategory as $productItem)
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
                                                    <span
                                                        class="current_price">{{ $productItem->selling_price }}$</span>
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
    </div>
</div>
