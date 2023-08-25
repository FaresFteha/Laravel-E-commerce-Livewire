<div>
    <style>
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
    <!--shopping cart area start -->
    <div class="shopping_cart_area">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($Cart as $CartItems)
                                            @if ($CartItems->product)
                                                <tr>
                                                    <td class="product_remove"><a
                                                            wire:click="deleteCart({{ $CartItems->id }})"
                                                            type="button"><i class="fa fa-trash-o"></i>

                                                            <div wire:loading.remove
                                                                wire:target="deleteCart({{ $CartItems->id }})">
                                                            </div>
                                                            <div wire:loading
                                                                wire:target="deleteCart({{ $CartItems->id }})">
                                                                Removing...
                                                            </div>
                                                        </a>

                                                    </td>
                                                    <td class="product_thumb"><a
                                                            href="{{ url('/collections/' . $CartItems->product->category->slug . '/' . $CartItems->product->slug) }}"><img
                                                                src="{{ asset($CartItems->product->ProductImages[0]->image) }}"
                                                                alt="{{ $CartItems->product->name }}"></a>
                                                    </td>
                                                    <td class="product_name"><a
                                                            href="{{ url('/collections/' . $CartItems->product->category->slug . '/' . $CartItems->product->slug) }}">{{ $CartItems->product->name }}</a><br>
                                                        @if ($CartItems->productColor)
                                                            @if ($CartItems->productColor->color)
                                                                <small><strong>With color:
                                                                        {{ $CartItems->productColor->color->name }}</strong></small>
                                                            @endif
                                                        @else
                                                            <small>with color:Not Selected</small>
                                                        @endif
                                                    </td>
                                                    <td class="product-price"> ${{ $CartItems->product->selling_price }}
                                                    </td>
                                                    <td class="product_quantity social_sharing">
                                                        <ul>
                                                            <li><a wire:loading.attr="disabled"
                                                                    wire:click="decrementQuantity({{ $CartItems->id }})"
                                                                    type="button" class="bg-pinterest"
                                                                    data-toggle="tooltip" title="decremint"><i
                                                                        class="fa fa-minus"></i></a></li>
                                                            <li><input type="text"
                                                                    value="{{ $CartItems->quantity }}">
                                                            </li>
                                                            <li><a wire:loading.attr="disabled"
                                                                    wire:click="incrementQuantity({{ $CartItems->id }})"
                                                                    type="button" class="bg-Tweet"
                                                                    data-toggle="tooltip" title="incremnet"><i
                                                                        class="fa fa-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="product_total">
                                                        ${{ $CartItems->product->selling_price * $CartItems->quantity }}
                                                    </td>
                                                    @php
                                                        $subTotal += $CartItems->product->selling_price * $CartItems->quantity;
                                                        $totalAmount += $CartItems->product->selling_price * $CartItems->quantity;
                                                    @endphp
                                                </tr>
                                            @endif

                                        @empty
                                            <h4>No Wishlist Added</h4>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal</p>
                                        <p class="cart_amount">${{ $subTotal }}</p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Shipping</p>
                                        <p class="cart_amount"><span>Flat Rate:</span>$30</p>
                                    </div>
                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <p class="cart_amount">${{ $totalAmount }}</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
    <!--shopping cart area end -->

</div>
