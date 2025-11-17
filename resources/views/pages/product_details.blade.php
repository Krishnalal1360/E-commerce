<x-app-layout>
     <!--============================
        PRODUCT DETAILS START
    =============================-->
    <section class="wsus__product_details mt_170 mb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5 wow fadeInLeft">
                    <div class="wsus__product_details_slider_area">
                        <div class="row slider-forFive">
                                @foreach ($product->images as $image)
                                    <div class="col-xl-12">
                                        <div class="wsus__product_details_slide_show_img">
                                            {{--  
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="product" class="img-fluid w-100">
                                            --}}
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                        <div class="wsus__product_details_slider">
                            <div class="row slider-navFive">
                                @foreach ($product->images as $image)
                                    <div class="col-xl-2">
                                        <div class="wsus__product_details_slider_img">
                                            <img src="{{ asset('storage/'. $image->path) }}" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 wow fadeInRight">
                    <div class="wsus__product_summary">
                        <h2>{{ $product->name }}</h2>
                        <span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <b>8k+ reviews</b>
                        </span>
                        <h6>{{ '₹' . $product->price }}</h6>
                        <p>{!! $product->description !!}</p>
                        <h6 class="mt_30">Color</h6>
                        <select class="select_2 color" name="state">
                            <option value="AL">Select Color</option>
                            @foreach ($product->colors as $color)
                                <option value="{{ $color->name }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                        <div class="wsus__product_add_cart">
                            <div class="wsus__product_quantity">
                                <button class="minus decrement" type="submit"><i class="far fa-minus"></i></button>
                                <input type="text" placeholder="01" value="1" min="1" class="quantity">
                                <button class="plus increment" type="submit"><i class="far fa-plus"></i></button>
                            </div>
                            <div class="wsus__buy_cart_button">
                                <a href="" class="common_btn add-to-cart" data-id="{{ $product->id }}">Add To Cart</a>
                            </div>
                        </div>
                        <ul class="wishlist d-flex flex-wrap">
                            <li><a href="#"><span><i class="fal fa-heart"></i></span>ADD TO WISHLIST</a></li>
                            <li><a href="#"><span><i class="fal fa-share-alt"></i></span>SHARE</a></li>
                        </ul>
                        <ul class="details">
                            <li>SKU:<span>GM90876</span></li>
                            <li>Categories:<span>Casual, walk, run, brand</span></li>
                            <li>Tags:<span>gym, health, run, style</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wsus__product_details_menu_contant">
                        <div class="wsus__product_description wow fadeInUp">
                            <p>Knowing how to pick the right types of athletic shoes can be a challenge—enter
                                our athletic shoe buying guide! First, we'll explain how to measure your shoe
                                size to make sure your footwear fits properly. Next, we'll cover the differences
                                between road running, trail running, hiking and walking shoes to help you pick
                                the best ones for your terrain. Finally, we'll dive into specifics on
                                weightlifting, court and cross-training kicks.</p>
                            <div class="row">
                                <div class="col-md-6 col-xl-6 wow fadeInUp">
                                    <div class="wsus__shoe_size_measure">
                                        <h6>How to Measure Your Shoe Size</h6>
                                        <ul>
                                            <li>1. Trace an outline of your bare foot on a piece of paper.</li>
                                            <li>2. Use a ruler to measure the longest and widest.</li>
                                            <li>3. If one foot is larger than the other</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6 wow fadeInUpt">
                                    <div class="wsus__shoe_size_measure">
                                        <h6>Road-Running Shoes</h6>
                                        <ul>
                                            <li>1. Trace an outline of your bare foot on a piece of paper.</li>
                                            <li>2. Use a ruler to measure the longest and widest.</li>
                                            <li>3. If one foot is larger than the other</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt_50 align-items-center">
                                <div class="col-lg-5 col-xl-4 wow fadeInLeft">
                                    <div class="wsus__product_description_img">
                                        <img src="images/product_description_img.jpg" alt="product"
                                            class="img-fluid w-100">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-xl-8 wow fadeInRight">
                                    <div class="wsus__product_description_text">
                                        <h6>Road-Running Shoes</h6>
                                        <ul>
                                            <li>1. Trace an outline of your bare foot on a piece of paper.</li>
                                            <li>2. Use a ruler to measure the longest and widest.</li>
                                            <li>3. If one foot is larger than the other</li>
                                        </ul>
                                        <p>From sleek racing flats to burly hiking boots, there are plenty of
                                            options to keep your feet comfortable during any activity. Read on
                                            to learn how to determine the right athletic shoes to wear for
                                            whatever athletic pursuit you're embarking on.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">
        <script>
            $(document).ready(function(){
                $(".add-to-cart").on("click", function(e){
                    e.preventDefault();
                    //alert("Added To Cart!");
                    let productID = $(this).data('id');
                    let productColor = $('.color').val();
                    let productQty = $('.quantity').val();
                    //alert(productColor);
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('add-to-cart', ':id') }}".replace(':id', productID),
                        data: {
                            _token: "{{ csrf_token() }}",
                            color: productColor,
                            quantity: productQty,
                        },
                        beforeSend: function(){

                        },
                        success: function(data){

                        },
                        error: function(xhr, status, error){

                        }
                    });
                });
                $(".increment").on("click", function(){
                    let productQty = parseInt($(".quantity").val())+1;
                    $(".quantity").val(productQty);
                });
                $(".decrement").on("click", function(){
                    let productQty = parseInt($(".quantity").val());
                    if(productQty > 1){
                        productQty = productQty-1;
                        $(".quantity").val(productQty);
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>