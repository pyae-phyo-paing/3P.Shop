@extends('layouts.front')
@section('content')

<!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid banner_img" src="{{asset('front-assets/./assets/img/banner_img_08.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"> 3P.Shop</h1>
                                <h3 class="h2">Pick up a variety of Trandly Fashion</h3>
                                <p>
                                    Get very smart men's fashion, very beautiful lady's fashion, very cute kids' fashion at <strong>3P.Shop</strong>.
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{asset('front-assets/./assets/img/men_banner_img_01.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">3P.Shop</h1>
                                <h3 class="h2">Choose your favorite style for smart and modern fashion</h3>
                                <p>
                                    To dress smartly and enjoy the beauty of nature, own trendy fashion from <strong>3P.Shop</strong>!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{asset('front-assets/./assets/img/lady_banner_img_01.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">3P.Shop</h1>
                                <h3 class="h2">Choose your favorite to beautify your fashion style</h3>
                                <p>
                                    Buy lady fashion from <strong>3P.Shop</strong>, wear it beautifully and shape the life of a woman. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{asset('front-assets/./assets/img/kid_banner_img_01.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">3P.Shop</h1>
                                <h3 class="h2">Choose the best for your child's fashion</h3>
                                <p>
                                    To make your child's future bright, to make everything perfect, to make people look beautiful, order baby fashion at <strong> 3P.Shop</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Get Your The Best Choice</h1>
                <p>
                    Let's shop at <strong>3P.Shop</strong> to beautify your daily life, to have a brighter future, to interest everyone who sees it, to complete your life and meet the needs of life.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{asset('front-assets/./assets/img/men_fashion_menu_img_03.jpg')}}" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Men Fashions</h5>
                <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{asset('front-assets/./assets/img/woman_fashion_menu_img_01.jpg')}}" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Woman Fashions</h2>
                <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{asset('front-assets/./assets/img/kids_fashion_menu_img_03.jpg')}}" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Kids Fashions</h2>
                <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Trandy Fashions</h1>
                    <p>
                        Change your style by wearing trendy fashions from <strong>3P.Shop</strong>. Buy and wear trendy fashions to popularize your style.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{route('shop-single',12)}}">
                            <img src="{{asset('front-assets/./assets/img/trandly_men_fashion_img_02.jpg')}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$240.00</li>
                            </ul>
                            <a href="{{ url('/brand/Gucci') }}" class="h2 text-decoration-none text-dark">Gucci</a>
                            <p class="card-text">
                                Step into a world where less is more.Where sleek design meets daring confidence.Our "Minimal Yet Bold" collection redefines elegance—clean lines, striking accents, and timeless style.
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{route('shop-single',12)}}">
                            <img src="{{asset('front-assets/./assets/img/trandly_woman_fashion_img_01.jpg')}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$480.00</li>
                            </ul>
                            <a href="{{url('/brand/Louis Vuitton')}}" class="h2 text-decoration-none text-dark">Louis Vuitton</a>
                            <p class="card-text">
                                Stay cool, stay chic.Turn heads effortlessly with our perfect blend of comfort and style.
                            </p>
                            <p class="text-muted">Reviews (48)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{route('shop-single',12)}}">
                            <img src="{{asset('front-assets/./assets/img/trandly_kids_fashion_img_01.jpg')}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$360.00</li>
                            </ul>
                            <a href="#" class="h2 text-decoration-none text-dark">Summer Vacation Style</a>
                            <p class="card-text">
                                Cool linen shirts, playful printed shorts, and trendy accessories—perfect for beach days and sunny adventures!
                            </p>
                            <p class="text-muted">Reviews (74)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

@endsection