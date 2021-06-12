@extends('layouts.frontend')

@section('frontend_content')

    <main>
        <!-- PAGE INFO -->
        <section class="page-info set-bg" data-image-src="{{ asset('frontend') }}/images/page-info-bg-5.jpg">
            <div class="section-header">
                <h1 class="text-white">Food Details</h1>
                <span>~ Delicious food ~</span>
            </div>
        </section>
        
        <!-- SHOP SINGLE -->
        <section class="section-primary pt-150 pb-113 shop-single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images">
                            <figure class="woocommerce-product-gallery__wrapper">
                                <div class="woocommerce-product-gallery__image">
                                    <img id="zoom-image" class="attachment-shop_single size-shop_single wp-post-image" src="{{ asset('frontend') }}/images/shop-single-medium-1.jpg" data-zoom-image="{{ asset('frontend') }}/images/shop-single-big-1.jpg" alt="" />
                                </div>
                            </figure>
                            <div id="shop-single-thumb">
                                <a href="#" data-image="{{ asset('frontend') }}/images/shop-single-medium-1.jpg" data-zoom-image="{{ asset('frontend') }}/images/shop-single-big-1.jpg">
                                    <img src='{{ asset('frontend') }}/images/shop-single-small-1.jpg' alt="">
                                </a>
                                <a href="#" data-image="{{ asset('frontend') }}/images/shop-single-medium-2.jpg" data-zoom-image="{{ asset('frontend') }}/images/shop-single-big-2.jpg">
                                    <img src='{{ asset('frontend') }}/images/shop-single-small-2.jpg' alt="">
                                </a>
                                <a href="#" data-image="{{ asset('frontend') }}/images/shop-single-medium-3.jpg" data-zoom-image="{{ asset('frontend') }}/images/shop-single-big-3.jpg">
                                    <img src='{{ asset('frontend') }}/images/shop-single-small-3.jpg' alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="summary entry-summary">
                            <h3 class="product_title entry-title">{{ $food_info->food_name }}</h3>
                            <div class="info">
                                <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>{{ $food_info->price }}
                                    </span>
                                </span>
                                <span class="star-rating">
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                </span>
                            </div>
                            <div class="woocommerce-product-details__short-description">
                                <p>{{ $food_info->short_description }}.</p>
                            </div>

                           
                            <form action="{{ route('cart.store') }}" class="cart" method="post">
                                @csrf
                                <div class="quantity">
                                    <input type="hidden" value = "{{ $food_info->id }}" name = "food_id">

                                    <input type="number" class="input-text qty text" step="1" min="0" name="food_quantity" value="1" title="Qty" size="4" id="input-quantity">
                                    <div class="icon">
                                        <a href="#" class="number-button plus">+</a>
                                        <a href="#" class="number-button minus">-</a>
                                    </div>
                                </div>
                                <button type="submit" class="single_add_to_cart_button button alt au-btn round has-bg au-btn--hover">Add to cart</button>
                            </form>

                            <div class="product_meta">
                                <span class="posted_in">Category: <a href="{{ route('food.details' , $food_info->slug) }}" rel="tag">{{ $food_info->category_name }}</a></span>
                                <span class="tagged_as">Tag: 
                                    <a href="{{ route('food.details' , $food_info->slug) }}" rel="tag">{{ $food_info->tag_name }}</a>,
                                </span>
                            </div>
                            <div class="social">
                                <a href="#">
                                    <i class="zmdi zmdi-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="zmdi zmdi-facebook-box"></i>
                                </a>
                                <a href="#">
                                    <i class="zmdi zmdi-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="zmdi zmdi-instagram"></i>
                                </a>
                            </div>
                        </div>		
                    </div>
                </div>
                <!-- WOOCOMMERCE TABS -->
                <div class="woocommerce-tabs wc-tabs-wrapper">
                    <div id="shop-single-tab">
                        <ul class="tabs wc-tabs">
                            <li class="description_tab">
                                <a href="#description">Description</a>
                            </li>
                            <li class="additional_information_tab">
                                <a href="#add-info">Additional Information</a>
                            </li>
                            <li class="reviews_tab">
                                <a href="#review">Reviews (0)</a>
                            </li>
                        </ul>
                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="description">
                            <p>{{ $food_info->long_description }}. </p>
                        </div>
                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="add-info">
                            <table class="shop_attributes">
                                <tbody>
                                    <tr>
                                        <th>Weight</th>
                                        <td class="product_weight">{{ $food_info->weight }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dimensions</th>
                                        <td class="product_dimensions">{{ $food_info->dimensions }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="review" class="woocommerce-Reviews">
                            <div id="comments">
                                <h6 class="woocommerce-noreviews">
                                    BE THE FIRST TO REVIEW
                                </h6>
                            </div>
                            <div id="review_form_wrapper">
                                <div id="review_form">
                                    <div id="respond" class="comment-respond">
                                        <form method="get" id="comments-form" class="comments-form">
                                            <p class="comment-notes">Your email address will not be published. Required fields are marked.</p>
                                            <div class="comment-form-rating">
                                                <label>Your rating</label>
                                                <span class="star-rating">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                </span>
                                            </div>
                                            <p class="comment-form-comment">
                                                <textarea id="comment" name="comment" class="form-control" required placeholder="Your Message"></textarea>
                                            </p>
                                            <p class="comment-form-author">
                                                <input id="author" name="author" type="text" value="" class="form-control" aria-required="true" required="" placeholder="Your Name">
                                            </p>
                                            <p class="comment-form-email">
                                                <input id="email" name="email" type="email" value="" class="form-control" aria-required="true" required="" placeholder="Your Mail">
                                            </p>
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="submit au-btn round has-bg" value="Submit"> 
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- RELATED PRODUCT -->
                <div class="related products">
                    <h4>Related products</h4>	
                    <div class="row">

                        @forelse ($related_products as $food)

                        <div class="col-md-4 col-lg-3">
                            <div class="item">
                                <div class="thumb">
                                    <a href="{{ route('food.details' , $food->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <img src="{{  asset('uploads/food_photos')  }}/{{ $food->image }}" alt="">
                                    </a>

                                    <form action="{{ route('cart.store') }}" class="cart" method="post">
                                        @csrf
                                            <input type="hidden" value = "{{ $food->id }}" name = "food_id">
                                            <input type="hidden" name="food_quantity" value="1">
                                        <button type="submit" class="button product_type_simple add_to_cart_button ajax_add_to_cart" style="cursor: pointer">Add to cart</button>
                                    </form>


                                </div>
                                <div class="info">
                                    <h5 class="woocommerce-loop-product__title">

                                        <a href="{{ route('food.details' , $food->slug) }}">{{ $food->food_name }}</a>
                                    </h5>
                                    <div class="star-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-outline"></i>
                                    </div>
                                    <span class="price">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">$</span>{{ $food->price }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        @empty
                         No Related Product 
                        @endforelse


                    </div>

                </div>
            </div>
        </section>



    </main>


@endsection

		