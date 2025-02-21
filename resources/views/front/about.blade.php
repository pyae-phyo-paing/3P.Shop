@extends('layouts.front')
@section('content')

 <!-- Start Banner -->
 <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>About Us</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('front-assets/assets/img/about-hero.svg')}}" alt="About Hero">
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->
    {{-- Start Brand News --}}
    <div class="row text-center py-3 mt-5">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Our Brands</h1>
            <p>
                We are proud to collaborate with and support world-renowned luxury brands and trandy fashion brands.
            </p>
        </div>
    </div>

    <section class="bg-light">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center mt-3">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shop-card">
                        <a href="{{url('/brand/Gucci')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/gucci_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">Gucci Brand</h2>
                    <p>Gucci was founded in 1921 in Italy and has become one of the most popular luxury fashion brands in the world. Known for its sophisticated designs and premium quality, Gucci is recognized for its iconic monogram pattern and high-end leather goods. Recent collections blend modern designs with vintage vibes, maintaining its reputation for elegance and style.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Gucci')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center mt-3">
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">Louis Vuitton</h2>
                    <p>Founded in 1854 in France, Louis Vuitton is a luxury brand synonymous with elegance and craftsmanship. Famous for its signature monogram pattern, Louis Vuitton offers a range of premium products, including bags, shoes, accessories, and clothing. Its iconic bags have become status symbols, representing a luxurious lifestyle.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Louis Vuitton')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shop-card">
                        <a href="{{url('/brand/Louis Vuitton')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/louis_vuitton_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center mt-3">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shop-card">
                        <a href="{{url('/brand/Gucci')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/gucci_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">Gucci Brand</h2>
                    <p>Gucci was founded in 1921 in Italy and has become one of the most popular luxury fashion brands in the world. Known for its sophisticated designs and premium quality, Gucci is recognized for its iconic monogram pattern and high-end leather goods. Recent collections blend modern designs with vintage vibes, maintaining its reputation for elegance and style.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Gucci')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Services</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    Lorem ipsum dolor sit amet.
                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Delivery Services</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Promotion</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_01.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_02.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_03.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_04.png')}}" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_01.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_02.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_03.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_04.png')}}" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_01.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_02.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_03.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/brand_04.png')}}" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Third slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->

@endsection