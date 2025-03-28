<!DOCTYPE html>
<html lang="en">

<head>
    <title>3P.Shop Fashion Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('front-assets/assets/img/3pshop_logo.png') }}">

    <link rel="stylesheet" href="{{asset('front-assets/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front-assets/assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('front-assets/assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('front-assets/assets/css/fontawesome.min.css')}}">
<!--

    
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->

<!-- Slick -->
<link rel="stylesheet" type="text/css" href="{{asset('front-assets/assets/css/slick.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-assets/assets/css/slick-theme.css')}}">
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:leosurki3698@gmail.com">leosurki3698@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">09-789-643-507</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                3P.Shop
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('shop-home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <div class="m-0 nav-dropdown-btn">
                                    <a href="#" class="nav-dropdown-category nav-link">Categories <i class="fas fa-caret-down"></i> </a>
                                    <div class="nav-dropdown-content">

                                        <a href="{{route('getProductsByCategory','Men')}}">Men's Fashions</a>
                                        <a href="{{route('getProductsByCategory','Women')}}">Women's Fashions</a>
                                        <a href="{{route('getProductsByCategory','Kids')}}">Kids' Fashions</a>
                                      
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <div class="m-0 nav-dropdown-btn">
                                    <a href="#" class="nav-dropdown-category nav-link">Brand <i class="fas fa-caret-down"></i> </a>
                                    <div class="nav-dropdown-content">

                                        @php 
                                            $brands = \App\Models\Brand::all();
                                        @endphp
                                        @foreach ($brands as $brand)
                                            <a href="{{route('brand-list',$brand->id)}}">{{$brand->name}}</a>
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('shops')}}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">About</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="{{route('buying-cart')}}">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark count_item">0</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none">
                        @guest
                            <a href="/login" class="signup-button"><button style="background: linear-gradient(45deg, #a8e6cf, #dcedc1); color: #333; padding: 12px 24px; border: none; border-radius: 30px; font-size: 16px; font-weight: bold; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                                <i class="fas fa-user-plus"></i> Sign in
                            </button></a>
                        @else
                            <div class="mt-3 dropdown">
                                <button class="dropdown-button">
                                <div class="avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <span class="username">{{Auth::user()->name}}</span>
                                <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="dropdown-content">
                                    <a href="{{route('user-profile.index')}}"><i class="fas fa-user"></i> Profile</a>
                                    @if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Staff')
                                        <a href="/backend"><i class="fas fa-cog"></i>Admin Panel</a>
                                    @endif
                                    <a href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </a>
                    
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    @yield('content')


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">3P.Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            77 St, Bet: 30 St x 31 St, 
                            Chanayethazan Township, Mandalay
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:09-789-643-507">09-789-643-507</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:leosurki@gmail.com">leosurki@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Categories</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="{{route('getProductsByCategory','Men')}}">Men's Fashions</a></li>
                        <li><a class="text-decoration-none" href="{{route('getProductsByCategory','Women')}}">Women's Fashions</a></li>
                        <li><a class="text-decoration-none" href="{{route('getProductsByCategory','Kids')}}">Kid's Fashions</a></li>
                    </ul>
                </div>


                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="{{route('shop-home')}}">Home</a></li>
                        <li><a class="text-decoration-none" href="{{route('about')}}">About Us</a></li>
                        <li><a class="text-decoration-none" href="{{route('shops')}}">Shop</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-light border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2025 3P.Shop Fashion Company 
                            | Designed by <a rel="sponsored" href="mailto:leosurki3698@gmail.com" target="_blank">Leo Surki</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{asset('front-assets/assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('front-assets/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('front-assets/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front-assets/assets/js/templatemo.js')}}"></script>
    <script src="{{asset('front-assets/assets/js/custom.js')}}"></script>
    <!-- End Script -->
    
    <script src="{{asset('front-assets/assets/jquery/jquery-3.7.1.min.js')}}"></script>
    {{-- Add To Cart --}}
    <script src="{{asset('front-assets/assets/js/sweetalert2@11.js')}}"></script>
    <script src="{{asset('front-assets/assets/js/add_to_cart.js')}}"></script>
    <script src="{{asset('front-assets/assets/js/slick.min.js')}}"></script>
    @yield('script')
</body>

</html>