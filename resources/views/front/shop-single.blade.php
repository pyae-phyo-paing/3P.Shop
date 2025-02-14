@extends('layouts.front')
@section('content')

<!-- Open Content -->
<section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{$product->image}}" alt="Card image cap" id="product-detail">
                    </div>
                    
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$product->name}}</h1>

                            @if ($product->discount > 0)
                                <ul class="list-inline mt-4 mb-0">
                                    <li class="list-inline-item">
                                        <h6>Normal Price :</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p style="text-decoration: line-through; color:red"><strong>{{$product->price}} MMK</strong></p>
                                    </li>
                                </ul>

                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <h6>Discount Price :</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p><strong>{{$product->price - ($product->price * ($product->discount/100))}} MMK</strong> <span>({{$product->discount}}% - Discount)</span></p>
                                    </li>
                                </ul>
                            @elseif($product->discount == 0)
                                <ul class="list-inline mt-4">
                                    <li class="list-inline-item">
                                        <h6>Price :</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p><strong>{{$product->price}} MMK</strong></p>
                                    </li>
                                </ul>
                            @endif


                            <p class="pt-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                            </p>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p><strong>{{$product->brand->name}}</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>{{$product->description}}</p>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Category:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$product->category->name}}</strong></p>
                                </li>
                            </ul>

                            <form action="">
                                @csrf
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item size_select">Size :
                                                <select name="size_option" id="size_option">
                                                    <option value="" disabled selected>Select your size</option>
                                                    <option value="xl" data-size="xl">xl</option>
                                                    <option value="Medium" data-size="Medium">Medium</option>
                                                    <option value="Large" data-size="Large">Large</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                            </li>
                                            <li class="list-inline-item text-right">
                                                <span class="btn btn-success" id="minus-btn">-</span>
                                            </li>
                                            <li class="list-inline-item text-right">
                                                <input class="form-control text-center text-light bg-secondary qty" id="var-value" type="num" value="1" style="max-width: 3rem" />
                                                <input type="hidden" id="available_instock" value="{{ $product->instock }}"> <!-- Product Table ထဲက Qty -->
                                            </li>
                                            <li class="list-inline-item text-right">
                                                <span class="btn btn-success" id="plus-btn">+</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row">
                                    <span id="error-msg" style="color: red; display: none;">❌ This product is currently unavailable!</span>
                                </div>

                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg addToCart" id="add_to_cart" name="submit" value="addtocard" data-id={{$product->id}} data-name={{$product->name}} data-price={{$product->price}} data-discount={{$product->discount}} data-brand={{$product->brand->name}} data-category={{$product->category->name}} data-image={{$product->image}}>Add To Cart</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>

            <!--Start Carousel Wrapper-->
            
                <div id="carousel-related-product">

                    <div class="p-2 pb-3">
                        <div class="product-wap card rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="{{asset('front-assets/assets/img/shop_08.jpg')}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">Red Clothing</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$20.00</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="p-2 pb-3">
                        <div class="product-wap card rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="{{asset('front-assets/assets/img/shop_09.jpg')}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">White Shirt</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$25.00</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="p-2 pb-3">
                        <div class="product-wap card rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="{{asset('front-assets/assets/img/shop_10.jpg')}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">Oupidatat non</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$45.00</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="p-2 pb-3">
                        <div class="product-wap card rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="{{asset('front-assets/assets/img/shop_11.jpg')}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">Black Fashion</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$60.00</p>
                            </div>
                        </div>
                    </div>
    
                    
                </div>
            


        </div>
    </section>
    <!-- End Article -->

@endsection
@section('script')

    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <script>
        $(document).ready(function() {

        // Plus Button Click Event
        $("#plus-btn").click(function() {
            let qty = parseInt($("#var-value").val()); // Get current value
            $("#var-value").val(qty + 1); // Increase value by 1
        });

        // Minus Button Click Event
        $("#minus-btn").click(function() {
            let qty = parseInt($("#var-value").val()); // Get current value
            if (qty > 1) { // Prevent going below 1
                $("#var-value").val(qty - 1); // Decrease value by 1
            }
        });

        // Prevent manually entering values below 1
        $("#var-value").on("input", function() {
            let qty = parseInt($(this).val());
            if (qty < 1 || isNaN(qty)) {
                $(this).val(1); // If less than 1, reset to 1
            }
        });

        $("#var-value").on("input", function() {
            let inputQty = parseInt($(this).val()); // User ရိုက်ထည့်တဲ့ Qty
            let availableQty = parseInt($("#available_instock").val()); // Product Table ထဲက Qty

            if (inputQty > availableQty) {
                Swal.fire({
                icon: "error",
                title: "Stock Not Available!",
                text: "❌ This product is not available in the quantity you ordered!",
                confirmButtonColor: "#d33"
                }); // Error Message ပြမယ်
                $("#add_to_cart").prop("disabled", true); // Button ကို Disabled လုပ်မယ်
            } else {
                $("#error-msg").hide(); // Stock မှန်ရင် Message ကို Hidden ပြန်လုပ်မယ်
                $("#add_to_cart").prop("disabled", false); // Button ကို Active ပြန်လုပ်မယ်
            }
        });

        let instock = parseInt($("#available_instock").val()); // Instock Value

        if (instock === 0) {
                Swal.fire({
                    icon: "error",
                    title: "Out of Stock!",
                    text: "❌ This product is currently unavailable.",
                    confirmButtonColor: "#d33"
                });

                $("#error-msg").show();
                $("#add_to_cart").prop("disabled", true); // Button ကို Disable လုပ်မယ်
            }

    });
    </script>

@endsection

