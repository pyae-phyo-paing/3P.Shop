@extends('layouts.front')
@section('content')

<!-- Open Content -->
<section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid shop-card" src="{{$product->image}}" alt="Card image cap" id="product-detail">
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
                            <p>{!! trim(preg_replace('/<p>\s*<\/p>/', '', $product->description)) !!}</p>

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
                                                    <option value="XS" data-size="XS">XS (Extra Small)</option>
                                                    <option value="S" data-size="S">S (Small)</option>
                                                    <option value="M" data-size="M">M (Medium)</option>
                                                    <option value="L" data-size="L">L (Large)</option>
                                                    <option value="XL" data-size="XL">XL (Extra Large)</option>
                                                    <option value="XXL" data-size="XXL">XXL (Double Extra Large)</option>
                                                    <option value="XXXL" data-size="XXXL">XXXL (Triple Extra Large)</option>
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
    @if ($related_products)
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>

            <!-- Custom Slider -->
            <div class="custom-slider-container">
                <button id="prevSlide" class="custom-carousel-btn left-btn">
                    <i class="fa fa-chevron-left"></i>
                </button>

                <div class="custom-slider-wrapper">
                    <div class="custom-slider">
                        @foreach ($related_products as $related_product)
                            <div class="custom-slide">
                                <div class="related-product-card">
                                    <a href="{{ route('shop-single', $related_product->id) }}" class="text-decoration-none">
                                        <div class="related-product-image-container">
                                            <img class="related-product-image shop-card" src="{{ $related_product->image }}" alt="{{ $related_product->name }}">
                                        </div>
                                    </a>
                                    <div class="related-product-info">
                                        <h5 class="related-product-name">{{ $related_product->name }}</h5>
                                        <p class="related-product-brand">{{ $related_product->brand->name }} Brand</p>
                                        <span class="related-price">{{ number_format($related_product->price) }} MMK</span>
                                        
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $related_product->rating)
                                                    <i class="fa fa-star text-warning"></i>
                                                @else
                                                    <i class="fa fa-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </div>

                                        <a href="{{ route('shop-single', $related_product->id) }}" class="related-view-button">View</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button id="nextSlide" class="custom-carousel-btn right-btn">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
@endif
    

@endsection
@section('script')

    <script>
      document.addEventListener("DOMContentLoaded", function () {
    let slider = document.querySelector(".custom-slider");
    let slides = document.querySelectorAll(".custom-slide");
    let prevButton = document.getElementById("prevSlide");
    let nextButton = document.getElementById("nextSlide");

    let index = 0;
    let totalSlides = slides.length;
    let slideWidth = slides[0].offsetWidth;
    let visibleSlides = getVisibleSlides();

    function getVisibleSlides() {
        if (window.innerWidth <= 576) return 1; // Mobile (Small) => Show 1 Slide
        if (window.innerWidth <= 768) return 2; // Mobile (Medium) => Show 2 Slides
        if (window.innerWidth <= 992) return 3; // Tablet => Show 3 Slides
        return 4; // Desktop => Show 4 Slides
    }

    function updateSlideWidth() {
        slides = document.querySelectorAll(".custom-slide");
        slideWidth = document.querySelector(".custom-slide").offsetWidth;
        visibleSlides = getVisibleSlides();
        updateSlidePosition();
    }

    function updateSlidePosition() {
        let maxIndex = totalSlides - visibleSlides;
        index = Math.min(index, maxIndex);
        let translateValue = index * slideWidth;
        slider.style.transform = `translateX(-${translateValue}px)`;
    }

    function goToNextSlide() {
        if (index < totalSlides - visibleSlides) {
            index++;
        } else {
            index = 0;
        }
        updateSlidePosition();
    }

    function goToPrevSlide() {
        if (index > 0) {
            index--;
        } else {
            index = totalSlides - visibleSlides;
        }
        updateSlidePosition();
    }

    nextButton.addEventListener("click", goToNextSlide);
    prevButton.addEventListener("click", goToPrevSlide);
    window.addEventListener("resize", updateSlideWidth);

    updateSlideWidth();
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

