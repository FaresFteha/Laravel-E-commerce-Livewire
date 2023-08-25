      <!--header area start-->
      <style>
          .wishlist_link span.wishlist_link_count {
              min-width: 22px;
              min-height: 22px;
              line-height: 22px;
              background: #dc4444;
              border-radius: 100%;
              color: #ffffff;
              font-size: 10px;
              font-weight: 700;
              text-align: center;
              display: inline-block;
          }

          .wishlist_link span.wishlist_link_count {
              position: absolute;
              top: -6px;
              left: 44px;
          }
      </style>
      <header class="header_area">
          <!--header top start-->
          <div class="header_top">
              <div class="container">
                  <div class="row align-items-center">

                      <div class="col-lg-6 col-md-6">
                          <div class="welcome_text">
                              <p>Fastest Online Shopping Destination</p>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="top_right text-right">
                              <ul>
                                  @if (Route::has('login'))
                                      @auth
                                          <li class="top_links"><a href="#">{{ Auth::user()->name }} <i
                                                      class="ion-chevron-down"></i></a>
                                              <ul class="dropdown_links">
                                                  <li><a href="{{ route('myaccount') }}">My Account</a></li>
                                                  <form method="POST" action="{{ route('logout') }}">
                                                      @csrf
                                                      <li><a href="my-account.html" href="{{ route('logout') }}"
                                                              onclick="event.preventDefault();
                                                    this.closest('form').submit();">Logout</a>
                                                      </li>
                                                  </form>

                                              </ul>
                                          </li>
                                      @else
                                          <li><a href="{{ route('login') }}">Login</a></li>
                                          @if (Route::has('register'))
                                              <li><a href="{{ route('register') }}">Register</i></a>
                                          @endif
                                      @endauth
                                  @endif
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--header top start-->
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          <!--header middel start-->
          <div class="header_middel">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-lg-3 col-md-4">
                          <div class="logo">
                              <a href="index.html"><img src="{{ asset('asset/frontend/assets/img/logo/logo.png') }}"
                                      alt=""></a>
                          </div>
                      </div>
                      <div class="col-lg-7 col-md-5">
                          <div class="search_bar">
                              <form action="{{ route('search') }}" method="GET">
                                  <input name="search" value="{{ Request::get('search') }}" placeholder="Search entire store here..."
                                      type="text">
                                  <button type="submit"><i class="ion-ios-search-strong"></i></button>
                              </form>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-3">
                          <div class="cart_area">
                              <div class="wishlist_link">
                                  <a href="{{ route('wishlist') }}"><i class="ion-ios-heart-outline"></i></a>
                                  <span
                                      class="wishlist_link_count"><livewire:frontend.wish-list.wish-list-count /></span>
                              </div>
                              <div class="cart_link">
                                  <a href="{{ route('cart') }}"><i class="ion-ios-cart-outline"></i>My Cart</a>
                                  <span class="cart_count"><livewire:frontend.cart.cart-count /></span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--header middel end-->

          <!--header bottom satrt-->
          <div class="header_bottom sticky-header">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-3 col-md-5">
                          <div class="categories_menu">
                              <div class="categories_title">
                                  <h2 class="categori_toggle"> All categories</h2>
                              </div>
                              <div class="categories_menu_inner">
                                  <?php
                                  $CategoriesIndex = App\Models\category::where('status', '1')->get();
                                  ?>
                                  @forelse ($CategoriesIndex as $items)
                                      <ul>
                                          <li><a
                                                  href="{{ route('collections.categoriesSlug', $items->slug) }}">{{ $items->name }}</a>
                                          </li>
                                      </ul>
                                  @empty
                                      <li><a href="#">Not Category here</a></li>
                                  @endforelse
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="main_menu_inner">
                              <div class="main_menu d-none d-lg-block">
                                  <ul>

                                      <li class="active"><a href="{{ route('wellcomeHomePage') }}">Home</a></li>
                                      <li><a href="{{ route('shop') }}">Shop</a></li>
                                      <li><a href="#">Pages shop <i class="fa fa-angle-down"></i></a>
                                          <ul class="mega_menu">
                                              <li><a href="#">Shop Pages</a>
                                                  <ul>
                                                      <li><a href="shop-fullwidth-list.html">Cart</a></li>
                                                      <li><a href="shop-fullwidth-list.html">Wishlist</a></li>
                                                      <li><a href="shop-right-sidebar.html">Checkout </a></li>
                                                  </ul>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a href="blog.html">blog</a></li>
                                      <li><a href="contact.html">Contact Us</a></li>
                                  </ul>

                              </div>
                              <div class="mobile-menu d-lg-none">
                                  <nav>
                                      <ul>
                                          <li class="active"><a href="{{ route('wellcomeHomePage') }}">Home</a></li>
                                          <li><a href="shop.html">shop <i class="fa fa-angle-down"></i></a>
                                              <ul class="mega_menu">
                                                  <li><a href="#">Shop Pages</a>
                                                      <ul>
                                                          <li><a href="shop-fullwidth.html">Shop</a></li>
                                                          <li><a href="shop-fullwidth-list.html">Cart</a></li>
                                                          <li><a href="shop-fullwidth-list.html">Wishlist</a></li>
                                                          <li><a href="shop-right-sidebar.html">Checkout </a></li>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </li>
                                          <li><a href="blog.html">blog</a>
                                          </li>
                                          <li><a href="contact.html">Contact Us</a></li>
                                      </ul>

                                  </nav>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2">
                          <div class="contact_phone">
                              <div class="contact_icone">
                                  <span class="pe-7s-headphones"></span>
                              </div>
                              <div class="contact_number">
                                  <p>Call Us:</p>
                                  <span>(999) 1234 56789</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--header bottom end-->
      </header>
      <!--header area end-->
