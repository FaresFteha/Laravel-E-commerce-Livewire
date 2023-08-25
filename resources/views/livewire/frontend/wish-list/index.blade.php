<div>
    <div class="wishlist_area">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc wishlist">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Stock Status</th>
                                            <th class="product_total">Add To Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($wishList as $wishListItems)
                                            @if ($wishListItems->product)
                                                <tr>
                                                    <td class="product_remove"><a wire:click="deleteWishList({{ $wishListItems->id }})" type="button">
                                                        <div wire:loading.remove wire:target="deleteWishList({{ $wishListItems->id }})">
                                                            X
                                                        </div>
                                                        <div wire:loading wire:target="deleteWishList({{ $wishListItems->id }})">
                                                            Removing...
                                                        </div>
                                                     </a>
                                                    
                                                    </td>
                                                    <td class="product_thumb"><a
                                                            href="{{ url('/collections/' . $wishListItems->product->category->slug . '/' . $wishListItems->product->slug) }}"><img
                                                                src="{{ asset($wishListItems->product->ProductImages[0]->image) }}"
                                                                alt="{{ $wishListItems->product->name }}"></a></td>
                                                    <td class="product_name"><a
                                                            href="{{ url('/collections/' . $wishListItems->product->category->slug . '/' . $wishListItems->product->slug) }}">{{ $wishListItems->product->name }}</a>
                                                    </td>
                                                    <td class="product-price">
                                                        ${{ $wishListItems->product->selling_price }}
                                                    </td>
                                                    <td class="product_quantity">
                                                        @if ($wishListItems->product->quantity > 0)
                                                            <span class="badge badge-success">In Stock</span>
                                                        @else
                                                            <span class="badge badge-danger">Out of Stock</span>
                                                        @endif
                                                    </td>
                                                    <td class="product_total"><a href="#">Add To Cart</a></td>
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

            </form>

        </div>
    </div>
</div>
