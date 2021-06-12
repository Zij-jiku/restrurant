@extends('layouts.frontend')

@section('frontend_content')
    <main>
        <!-- PAGE INFO -->
        <section class="page-info set-bg" data-image-src="{{ asset('frontend') }}/images/page-info-bg-5.jpg">
            <div class="section-header">
                <h1 class="text-white">Shop list</h1>
                <span>~ Delicious food ~</span>
            </div>
        </section>
        
        <!-- SHOP LIST -->
        <section class="section-primary pt-150 pb-113 shop-list">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="sorting">
                            <form method="get" class="woocommerce-ordering">
                                <p class="woocommerce-result-count">
                                    Showing 1–15 of 27 results
                                </p>
                                <div class="form-holder">
                                    <select name="orderby" class="orderby form-control">
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                            </form>
                        </div>
                        <div class="row products">

                            @forelse ($food_info as $food)

                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="{{ route('food.details' , $food->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                            <img src="{{ asset('uploads/food_photos') }}/{{ $food->image }}" alt="">
                                        </a>

                                        <form action="{{ route('cart.store') }}" class="cart" method="post">
                                            @csrf
                                            <div class="quantity">
                                                <input type="hidden" value = "{{ $food->id }}" name = "food_id">
                                                <input type="hidden" name="food_quantity" value="1">
                                            </div>
                                            <button type="submit" class="button product_type_simple add_to_cart_button ajax_add_to_cart au-btn--hover">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="info">
                                        <h5 class="woocommerce-loop-product__title">
                                            <a href="shop-single.html">{{ $food->food_name }}</a>
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

                             No Food Available
   
                            @endforelse

                        </div>

                       
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar">
                            <!-- SEARCH -->
                            <div class="widgets widget_search">
                                <form method="get" class="search-form">
                                    <input class="form-control" type="text" name="s" id="s" placeholder="Search">
                                    <button class="search-icon">
                                        <span class="lnr lnr-magnifier"></span>
                                    </button>
                                </form>
                            </div>
                            <!-- FILTER -->
                            <div class="widgets woocommerce widget_price_filter">
                                <div class="widget-title">
                                    <h5>Filter by price</h5>
                                </div>
                                <form method="get">
                                    <div class="price_slider_wrapper">
                                        <div id="slider"></div>
                                        <div class="price_slider_amount">
                                            <div class="price_label">
                                                Price: 
                                                <span class="from">
                                                    $<span id="lower-value">9</span>
                                                </span> — 
                                                <span class="to">
                                                    $<span id="upper-value">190</span>
                                                </span>
                                            </div>
                                            <button type="submit" class="button">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- CATEGORIES -->
                            <div class="widgets widget_categories">
                                <div class="widget-title">
                                    <h5>Categories</h5>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#">Seafood (<span>2</span>)</a>
                                    </li>
                                    <li>
                                        <a href="#">Coffee (<span>5</span>)</a>
                                    </li>
                                    <li>
                                        <a href="#">Restaurant (<span>18</span>)</a>
                                    </li>
                                    <li>
                                        <a href="#">Cupcake (<span>22</span>)</a>
                                    </li>
                                    <li>
                                        <a href="#">Lunch (<span>19</span>)</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- FEATURED PRODUCT -->
                            <div class="widgets woocommerce widget_featured_product">
                                <div class="widget-title">
                                    <h5>Products</h5>
                                </div>
                                <div class="featured-product">
                                    <div class="featured-product__item">
                                        <a href="shop-single.html" class="thumb">
                                            <img src="{{ asset('frontend') }}/images/featured-product-1.png" alt="">
                                        </a>
                                        <div class="info">
                                            <h6 class="woocommerce-loop-product__title">
                                                <a href="shop-single.html">Spicy Garlic Lime</a>
                                            </h6>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>26
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="featured-product__item">
                                        <a href="shop-single.html" class="thumb">
                                            <img src="{{ asset('frontend') }}/images/featured-product-2.png" alt="">
                                        </a>
                                        <div class="info">
                                            <h6 class="woocommerce-loop-product__title">
                                                <a href="shop-single.html">Baked Teriyaki</a>
                                            </h6>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>12
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="featured-product__item">
                                        <a href="shop-single.html" class="thumb">
                                            <img src="{{ asset('frontend') }}/images/featured-product-3.png" alt="">
                                        </a>
                                        <div class="info">
                                            <h6 class="woocommerce-loop-product__title">
                                                <a href="shop-single.html">Brown Sugar Meatloaf </a>
                                            </h6>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>13
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="featured-product__item">
                                        <a href="shop-single.html" class="thumb">
                                            <img src="{{ asset('frontend') }}/images/featured-product-4.png" alt="">
                                        </a>
                                        <div class="info">
                                            <h6 class="woocommerce-loop-product__title">
                                                <a href="shop-single.html">The Best Meatloaf </a>
                                            </h6>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>19
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- BANNER -->
                            <div class="widgets widget_banner">
                                <a href="#">
                                    <img src="{{ asset('frontend') }}/images/widget-banner.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

		