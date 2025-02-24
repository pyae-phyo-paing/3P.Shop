@extends('layouts.front')
@section('content')

<!-- Start Content -->
<div class="container py-5">
        <div class="row">

            <div class="col-lg-3 mt-5">
                <ul style="list-style-type: none;">

                    <li class="pb-3">
                        <a class="d-flex justify-content-between h3" href="#" style="text-decoration:none; color:black"> 
                            Brands
                        </a>
                        <ul class="list-unstyled pl-3">
                            @foreach($brands as $brand)
                                <li><a href="{{url('/brand/'.$brand->name)}}" class="text-decoration-none px-1 badge {{ $brand->name === $brandName ? 'badge-success' : 'badge-secondary' }}">{{$brand->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">{{$brandName}} Fashions</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch"> <!-- Column spacing & equal height -->
                        <div class="card product-card shadow-sm"> <!-- Shadow effect -->
                            <!-- Image Container -->
                            <div class="card-img-container">
                                <a href="{{route('shop-single',$product->id)}}">
                                    <img class="card-img-top product-image" src="{{$product->image}}" alt="{{$product->name}}">
                                </a>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column text-center product-card-body">
                                <h5 class="card-title">
                                    <a href="{{route('shop-single',$product->id)}}" class="text-decoration-none text-dark">{{$product->name}}</a>
                                </h5>
                                <p class="text-muted">{{$product->brand->name}} Brand</p>
                
                                <div class="price-discount">
                                    <span class="text-primary h5">{{$product->price}} MMK</span>
                                    @if ($product->discount > 0)
                                        <span class="text-danger h6 ml-2 px-2">{{$product->discount}}% Off</span>
                                    @endif
                                </div>
                
                                <div class="rating mb-2">
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </div>
                
                                <div class="mt-auto">
                                    <a href="{{route('shop-single',$product->id)}}" class="view-button">View</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands' Logo</h1>
                    <p>
                        You can view our brands' logo.
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
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
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/ysl_logo.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/champion_logo.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/louis_vuitton_logo.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/gucci_logo.png')}}" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/superme_logo.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/zara_logo.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/chanel_logo.png')}}" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="{{asset('front-assets/assets/img/dior_logo.png')}}" alt="Brand Logo"></a>
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
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.querySelector('[data-bs-toggle="collapse"]');
            const arrow = button.querySelector('.arrow');
        
            button.addEventListener('click', function () {
                if (button.classList.contains('collapsed')) {
                    arrow.style.transform = 'rotate(-90deg)'; // မျှားလေးကို လှည့်မယ်
                } else {
                    arrow.style.transform = 'rotate(0deg)'; // မျှားလေးကို ပြန်လှည့်မယ်
                }
            });
        });
    </script>
@endsection