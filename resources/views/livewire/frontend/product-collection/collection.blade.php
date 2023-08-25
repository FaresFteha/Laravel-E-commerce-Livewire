<div>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="breadcrumbs_inner">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <h3>shop</h3>
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li>shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop wrapper start-->
    <div class="shop_wrapper shop_fullwidth">
        <div class="container">
            <!--shop tab product-->
            <div class="shop_tab_product">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="large" role="tabpanel">
                        <div class="row">
                            @forelse ($products as $productItem)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            @if ($productItem->ProductImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"><img
                                                        src="{{ asset($productItem->ProductImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}"></a>
                                                {{-- <div class="btn_quickview">
                                        <a href="#" data-toggle="modal"
                                            data-target="#modal_box{{ $productItem->id }}" title="Quick View"><i
                                                class="ion-ios-eye"></i></a>
                                    </div> --}}
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
                                            <div class="product_action">
                                                <ul>
                                                    <li class="product_cart"><a wire:click="addToCart({{ $productItem->id }})"  type="button"  title="Add to Cart">Add
                                                            to
                                                            Cart</a></li>
                                                    <li class="add_links"><a
                                                            wire:click="addTOWishList({{ $productItem->id }})"
                                                            type="button" title="Add to Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <div class="p-2">
                                        <h4>No Product Available for {{ $categorySlug->name }}</h4>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!--shop tab product end-->


        </div>
    </div>
</div>
