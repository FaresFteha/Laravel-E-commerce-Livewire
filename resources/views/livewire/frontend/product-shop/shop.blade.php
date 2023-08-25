<div>
    <style>
        .checkbox-style {
            content: "";
            position: absolute;
            left: 0px;
            top: 8px;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            width: 16px;
            height: 16px;
            -webkit-transition: .3s;
            transition: .3s;
        }

        .add_links:hover {
            color: #ffffff
        }
    </style>
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!--shop toolbar start-->
            <div class="shop_toolbar">

                <div class="list_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a data-toggle="tab" href="#large" role="tab" aria-controls="large"><i
                                    class="ion-grid"></i></a>
                        </li>

                    </ul>
                </div>

                <div class="select_option number">

                    <label>Show:</label>
                    <select wire:model="paginate">
                        <option selected value="1">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>

                </div>
                <div class="select_option">
                    <form action="#">
                        <label>Sort By</label>
                        <select wire:model="sortBy">
                            <option value='asc'>ASC</option>
                            <option value='desc'>DESC</option>
                        </select>
                    </form>
                </div>



            </div>
            <!--shop toolbar end-->
            <!--shop tab product-->

            <div class="shop_tab_product">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="large" role="tabpanel">
                        <div class="row">
                            @forelse ($products as $productItem)
                                <div class="col-lg-4 col-md-6 col-sm-6">
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
                                            <div class="product_action">
                                                <ul>
                                                    <li class="product_cart"><a wire:click="addToCart({{ $productItem->id }})"  type="button" title="Add to Cart">Add
                                                            to Cart</a></li>
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
                                        <h4>No Product Available for {{-- $categorySlug->name --}}</h4>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>

            <!--shop tab product end-->

            <!--pagination style start-->
            <div class="float-right">
                {{ $products->links() }}
            </div>

            <!--pagination style end-->
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="sidebar_widget">
                <!--widget color start-->
                <div class="widget_list widget_search">
                    <h3>Search</h3>
                    <form action="#">
                        <input wire:model.debounce.350ms="search" placeholder="Search..." type="text">
                    </form>
                </div>

                <div class="widget_list widget_color">
                    <h3>Select By Brand</h3>

                    <ul>
                        @forelse ($brand as  $items)
                            <li><a>{{ $items->name }}<input wire:model="brandsList" value="{{ $items->name }}"
                                        class="checkbox-style" type="checkbox"> </a></li>

                        @empty
                            <div class="col-md-12">
                                <div class="p-2">
                                    <h4>No Brands Available</h4>
                                </div>
                            </div>
                        @endforelse

                    </ul>
                </div>
                <!--widget color start-->

                <!--widget  price start-->
                <div class="widget_list price">
                    <h3>Pricer</h3>
                    <ul>
                        <li><a>High to Low<input wire:model="priceInput" name="priceSort" value="high-to-low"
                                    class="checkbox-style" type="radio"> </a></li>
                    </ul>
                    <ul>
                        <li><a>Low to High<input wire:model="priceInput" name="priceSort" value="low-to-high"
                                    class="checkbox-style" type="radio"> </a></li>
                    </ul>


                </div>
                <!--widget  price start-->

                <!--manufacturer start-->
                {{-- <div class="widget_list manufacturer">
                    <h3>Manufacturer</h3>
                    <ul>
                        <li><a href="#">Fisher-Price </a></li>

                        <li><a href="#">WolVol </a></li>

                        <li> <a href="#"> K'NEX </a></li>

                        <li><a href="#">Liberty Imports</a></li>

                        <li><a href="#">ALEX Toys</a></li>
                    </ul>
                </div> --}}
                <!--manufacturer start-->


                <!--popular tags area-->
                {{-- <div class="widget_list tag_widget  ">
                    <h3>popular tags</h3>
                    <div class="block_tags">
                        <a href="#">ipod</a>
                        <a href="#">sam sung</a>
                        <a href="#">apple</a>
                        <a href="#">iphone 5s</a>
                        <a href="#">superdrive</a>
                        <a href="#">shuffle</a>
                        <a href="#">nano</a>
                        <a href="#">iphone 4s</a>
                        <a href="#">canon</a>
                    </div>
                </div> --}}
                <!--popular tags end-->

                <!--widget banner start-->
                <div class="widget_list banner">
                    <div class="banner_thumb">
                        <a href="#"><img src="assets/img/banner/banner9.png" alt=""></a>
                    </div>
                </div>
                <!--widget banner end-->
            </div>
        </div>
    </div>

</div>
