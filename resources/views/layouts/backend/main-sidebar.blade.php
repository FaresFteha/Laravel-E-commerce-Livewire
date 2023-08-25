<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="../index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2"
                    src="{{ asset('asset/backend/src/img/icons/spot-illustrations/falcon.png') }}" alt=""
                    width="40" /><span class="font-sans-serif">Portfolio</span>
            </div>
        </a>
    </div>

    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                {{-- Dashboard --}}
                <li class="nav-item">
                    <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span
                                class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    {{-- Home Page --}}
                    <ul class="nav collapse show" id="dashboard">
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Home</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Dashboard --}}
                {{-- App pages --}}
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">App
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link" href="{{ route('category.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-archive"></span></span><span
                                class="nav-link-text ps-1">Category</span>
                        </div>
                    </a>

                    <!-- parent pages-->
                    <a class="nav-link" href="{{ route('order.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-shopping-basket"></span></span><span class="nav-link-text ps-1">Order</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ route('product.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-boxes"></span></span><span class="nav-link-text ps-1">Product</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ route('brand.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fab fa-gratipay"></span></span><span class="nav-link-text ps-1">Brand</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ route('color.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-broom"></span></span><span class="nav-link-text ps-1">Color</span>
                        </div>
                    </a>




                    <!-- Hero-Section-->
                    <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="email">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-users"></span></span><span class="nav-link-text ps-1">Users</span>
                        </div>
                    </a>
                    <ul class="nav collapse false" id="email">
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Users</span>
                                </div>
                            </a>
                        </li>
                </li>
            </ul>
            <a class="nav-link" href="{{ route('slider.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-digital-tachograph"></span></span><span
                        class="nav-link-text ps-1">Slider</span>
                </div>
            </a>

            {{-- <a class="nav-link" href="{{ route('slider.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-cog"></span></span><span class="nav-link-text ps-1">Site Setting</span>
                </div>
            </a> --}}
            {{-- 
                    <li class="nav-item"><a class="nav-link" href="{{ route('settings.index') }}" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="fas fa-link"></span><span
                                    class="nav-link-text ps-1">Social media links</span>
                            </div>
                        </a>
                    
                    </li> --}}
            </li>
            </ul>
        </div>
    </div>
</nav>
