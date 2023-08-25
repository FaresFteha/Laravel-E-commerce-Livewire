<div>
    <style>
        .checkbox-style {
            content: "";
            position: absolute;
            left: 0px;
            top: 163px;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            width: 16px;
            height: 16px;
            -webkit-transition: .3s;
            transition: .3s;
        }

        .add_links:hover {
            color: #2971f5;
        }

        .social_sharing ul li a {
            line-height: 25px;
        }

        .social_sharing ul li a.bg-Tweet {
            margin-left: 8px;

        }

        input {
            height: 35px;
            width: 70px;
            text-align: center;
        }
    </style>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="breadcrumbs_inner">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <h3>product details</h3>
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li>product details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <div class="single_product_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="product_gallery">
                        <div class="tab-content produc_thumb_conatainer">

                            <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                                <div class="modal_img" wire:ignore>
                                    @if ($product->ProductImages)
                                        <div class="exzoom" id="exzoom">
                                            <!-- Images -->
                                            <div class="exzoom_img_box">

                                                <ul class='exzoom_img_ul'>
                                                    @foreach ($product->ProductImages as $itemProductImages)
                                                        <li><img src="{{ asset($itemProductImages->image) }}" />
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>

                                            <div class="exzoom_nav"></div>

                                            <!-- Nav Buttons -->

                                            <p class="exzoom_btn">

                                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                                </a>

                                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>

                                            </p>

                                        </div>
                                    @else
                                        No Image this Product
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="product_ratting">
                        @if ($product->quantity > 0)
                            <span class="badge badge-success">In Stock</span>
                        @else
                            <span class="badge badge-danger">Out of Stock</span>
                        @endif

                    </div>
                    <div class="product_details">
                        <h3>{{ $product->name }}</h3>
                        <div class="product_price">
                            <span class="current_price">${{ $product->selling_price }}</span>
                            <span class="old_price"><del>${{ $product->orginal_price }}</del></span>
                        </div>
                        <div class="product_ratting">
                            <ul>
                                <li>{{ $product->Category->name }}</li>
                                <li style="color: #2971f5">{{ $product->brand }}</li>
                            </ul>
                        </div>
                        <div class="modal_size mb-15">
                            <h2>Color</h2>
                            <div class="input-radio">
                                @if ($product->productColors->count() > 0)
                                    @if ($product->productColors)
                                        @foreach ($product->productColors as $colorItem)
                                            <span class="custom-radio" style="color: {{ $colorItem->color->code }}"
                                                wire:click="colorSelected({{ $colorItem->id }})"><input type="radio"
                                                    name="id_gender" value="{{ $colorItem->id }}">
                                                {{ $colorItem->color->name }}</span>
                                        @endforeach
                                    @endif
                                    @if ($this->productColorSelecteQuantity == 'outofStock')
                                        <span class="badge badge-danger">Out of Stock</span>
                                    @elseif ($this->productColorSelecteQuantity > 0)
                                        <span class="badge badge-success">In Stock</span>
                                    @endif
                                @else
                                    @if ($product->quantity)
                                        <span class="badge badge-success">In Stock</span>
                                    @else
                                        <span class="badge badge-danger">Out of Stock</span>
                                    @endif
                                @endif

                            </div>
                        </div>
                        <div class="product_description">
                            <p>
                                {{ $product->small_description }}
                            </p>
                        </div>
                        <div class="product_details_action">
                            <h3>Available Options</h3>
                            {{-- <div class="product_stock">
                               
                                <button class="btn btn-primary">-</button>
                                <input  type="text">
                                <button class="btn btn-primary">+</button>
                            </div> --}}
                            <div class="social_sharing">
                                <h5>Quantity:</h5>
                                <ul>
                                    <li><a wire:click="decincrementQuantity" type="button" class="bg-pinterest"
                                            data-toggle="tooltip" title="decremint"><i class="fa fa-minus"></i></a></li>
                                    <li><input wire:model="quantityCount" type="text"
                                            value="{{ $this->quantityCount }}" readonly></li>
                                    <li><a wire:click="incrementQuantity" type="button" class="bg-Tweet"
                                            data-toggle="tooltip" title="incremnet"><i class="fa fa-plus"></i></a></li>
                                </ul>
                            </div>
                            <br>
                            <div class="product_action_link">
                                <ul>
                                    <li wire:click="addToCart({{ $product->id }})" class="product_cart"><a
                                            type="button" title="Add to Cart">Add to Cart</a>
                                    </li>
                                    <li class="add_links"><a type="button"
                                            wire:click="addTOWishList({{ $product->id }})" title="Add to Wishlist">
                                            <div wire:loading.remove wire:target="addTOWishList">
                                                <i class="ion-ios-heart-outline"></i> Add to wishlist
                                            </div>
                                            <div wire:loading wire:target="addTOWishList">
                                                Adding...
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab"
                                        aria-controls="info" aria-selected="false">More info</a>
                                </li>
                                {{-- <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                        aria-selected="false">Data sheet</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                        aria-selected="false">Reviews</a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p> {{ $product->description }}</p>
                                </div>
                            </div>

                            {{-- <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Compositions</td>
                                                    <td>Polyester</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Styles</td>
                                                    <td>Girly</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Properties</td>
                                                    <td>Short Dress</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                        feminine designs delivering stylish separates and statement dresses which have
                                        since evolved into a full ready-to-wear collection in which every item is a
                                        vital part of a woman's wardrobe. The result? Cool, easy, chic looks with
                                        youthful elegance and unmistakable signature style. All the beautiful pieces are
                                        made in Italy and manufactured with the greatest attention. Now Fashion extends
                                        to a range of accessories including shoes, hats, belts and more!</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                        feminine designs delivering stylish separates and statement dresses which have
                                        since evolved into a full ready-to-wear collection in which every item is a
                                        vital part of a woman's wardrobe. The result? Cool, easy, chic looks with
                                        youthful elegance and unmistakable signature style. All the beautiful pieces are
                                        made in Italy and manufactured with the greatest attention. Now Fashion extends
                                        to a range of accessories including shoes, hats, belts and more!</p>
                                </div>
                                <div class="product_info_inner">
                                    <div class="product_ratting mb-10">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                        <strong>Posthemes</strong>
                                        <p>09/07/2018</p>
                                    </div>
                                    <div class="product_demo">
                                        <strong>demo</strong>
                                        <p>That's OK!</p>
                                    </div>
                                </div>
                                <div class="product_review_form">
                                    <form action="#">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published. Required fields are marked </p>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea name="comment" id="review_comment"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input id="email" type="text">
                                            </div>
                                        </div>
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product area start-->
    <div class="produtc_area related_Product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="consoles_product_title">
                        <h3>Related Products</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product_active owl-carousel">
                    @forelse ($category->relatedProducts as $productItem)
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
                                        <span class="old_price"><del>{{ $productItem->orginal_price }}</del>$</span>
                                    </div>
                                    <div class="product_action">
                                        <ul>
                                            <li class="product_cart"><a
                                                    wire:click="addToCart({{ $productItem->id }})" type="button"
                                                    title="Add to Cart">Add
                                                    to Cart</a></li>
                                            <li class="add_links"><a
                                                    wire:click="addTOWishList({{ $productItem->id }})" type="button"
                                                    title="Add to Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>

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
</div>
@push('scripts')
    <script>
        $(function() {

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,

                // autoplay
                "autoPlay": false,

                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000

            });

        });
    </script>
@endpush
