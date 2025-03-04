@extends('layouts.front')
@section('content')

 <!-- Start Banner -->
 <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>About Us</h1>
                    <p>
                        <p>
                            At 3P.Shop, we believe fashion is more than just clothing—it’s a statement of who you are! Our collection brings you the latest trends, high-quality designs, and stylish essentials that let you express yourself with confidence.
                        </p>

                        <p>
                            🌿 Fresh, Trendy & Affordable – We curate the best fashion pieces just for you.
                        </p>
                        <p>
                            💚 Style for Everyone – Whether you love casual, chic, or bold looks, we’ve got you covered.
                        </p>
                        <p>
                            🚀 Fast & Reliable Service – Shop with ease and get your favorites delivered to your doorstep.
                        </p>

                        <p>
                            Discover your perfect style today at 3P.Shop! 🛒✨
                        </p>
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
                    <h2 class="h2">Gucci</h2>
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
                        <a href="{{url('/brand/Yves Saint Laurent')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/ysl_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">YSL (Yves Saint Laurent)</h2>
                    <p>Founded in 1961 by Yves Saint Laurent, YSL is a French luxury fashion house known for its bold, innovative designs and commitment to sophistication. The brand is celebrated for revolutionizing women’s fashion, particularly with its tuxedo jacket for women. YSL is recognized for its elegant clothing, shoes, and accessories that blend classic style with modern edge.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Yves Saint Laurent')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center mt-3">
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">Champion</h2>
                    <p>Champion is an American sportswear brand founded in 1919, known for its high-quality athletic apparel and iconic reverse weave sweatshirt. Champion combines comfort, durability, and style, making it a leading choice in casual and activewear for people of all ages. The brand is particularly popular in streetwear fashion due to its iconic logo and retro designs.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Champion')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shop-card">
                        <a href="{{url('/brand/Champion')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/champion_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Section -->
    <section class="container py-2">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Services</h1>
                <p>
                    We provide this service for you! I hope you will like our service. You can get new trandy fashion with this services in <span class="text-success">3P.Shop</span>.
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

    <section class="bg-light">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center mt-3">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shop-card">
                        <a href="{{url('/brand/Superme')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/superme_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">Superme</h2>
                    <p>Supreme, established in 1994 in New York, is a streetwear brand renowned for its unique collaboration with various artists and designers. Known for its bold logo, limited-edition drops, and connection to skate culture, Supreme has grown into a global phenomenon. The brand is synonymous with exclusivity, rebellious fashion, and cool, urban style.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Superme')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center mt-3">
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">Zara</h2>
                    <p>Zara, founded in 1974 in Spain, is one of the world’s leading fast-fashion retailers. Known for bringing runway trends to the high street, Zara offers trendy, affordable clothing and accessories for men, women, and children. The brand focuses on quick turnaround times, enabling it to quickly respond to emerging fashion trends.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Zara')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shop-card">
                        <a href="{{url('/brand/Zara')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/zara_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
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
                        <a href="{{url('/brand/Dior')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/dior_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">Dior</h2>
                    <p>Christian Dior, founded in 1946, is a French luxury fashion brand known for its opulent designs and high couture. Dior made a significant mark in the fashion world with its “New Look” in 1947, which emphasized femininity with a cinched waist and full skirt. Today, the brand continues to set trends in fashion, beauty, and accessories, known for its elegance and craftsmanship.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Dior')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center mt-3">
                <div class="col-12 col-md-6 mb-4 text-center">
                    <h2 class="h2">Chanel</h2>
                    <p>Chanel, founded by Coco Chanel in 1909, is a symbol of timeless luxury, elegance, and femininity. Known for its classic quilted handbags, iconic little black dress, and the famous Chanel No. 5 perfume, the brand revolutionized fashion and beauty with its understated, yet refined style. Chanel represents high-class fashion, premium craftsmanship, and sophisticated design.</p>
                    <p class="text-center mt-4"><a class="btn go-shop-button" href="{{url('/brand/Chanel')}}">View Fashions<i class="fas fa-arrow-right"></i></a></p>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shop-card">
                        <a href="{{url('/brand/Chanel')}}" class="text-decoration-none"><img src="{{asset('front-assets/assets/img/chanel_brand_about.jpg')}}" class="card-img-top img-fluid" alt="Image"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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