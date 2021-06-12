<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Restrurant </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="{{ asset('frontend') }}/fonts/linearicons/style.css">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{ asset('frontend') }}/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- FONTAWESOME 5 -->
		<link rel="stylesheet" href="{{ asset('frontend') }}/fonts/font-awesome-5/css/fontawesome-all.min.css">

	    <!-- BOOTSTRAP -->
	    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/bootstrap/bootstrap.min.css">

	    <!-- owl-carousel -->
	    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/owl-carousel/css/owl.carousel.min.css">
	    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/owl-carousel/css/owl.theme.default.min.css">

	    <!-- LIGHT GALLERY -->
	    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/lightgallery/css/lightgallery.min.css">
		
	    <!-- ANIMATE -->
	    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">

	    <!-- DATE-PICKER -->
		<link rel="stylesheet" href="{{ asset('frontend') }}vendor/date-picker/datepicker.min.css">
		
	    <!-- SLIDER REVOLUTION -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/vendor/revolution-slider/css/layers.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/vendor/revolution-slider/css/navigation.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/vendor/revolution-slider/css/settings.css">

        <!-- SIDENAV MOBILE -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/hcmobilenav/demo.css">

        <!-- JQUERY TIME PICKER -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/jquery-timepicker-master/jquery.timepicker.css">

        <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

		<!-- FAVICON -->
        <link rel="shortcut icon" href="favicon.png">

	    <!-- STYLE CSS -->
	    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />
	</head>
	
	<body class="preload">

        <div class="div" style="overflow: hidden">

		<!-- PAGE LOADER -->
		<div class="{{ asset('frontend') }}/images-preloader">
		    <div id="preloader" class="rectangle-bounce">
		        <span></span>
		        <span></span>
		        <span></span>
		        <span></span>
		        <span></span>
		    </div>
		</div>

		{{-- <div class="page-wrapper"> --}}
			<header>
                <!-- HEADER ON DESKTOP -->
                <nav class="navbar-desktop">
                    <div class="left">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('frontend') }}/images/logo.png" alt="Royate">
                        </a>
                    </div>
                    <ul>
                        <li class="current has-children">
                            <a href="{{ url('/') }}">
                                Home
                            </a>
                        </li>
                      
                        <li>
                            <a href="{{ route('menu') }}">
                                Menu
                            </a>
                        </li>
                       
                        <li class="has-children">
                            <a href="{{ route('blog') }}">
                                Blog
                            </a>
                        </li>
                        <li class="has-children">
                            <a href="{{ route('shop') }}">
                                Shop
                            </a>
                        </li>

                        <li class="has-children">
                            <a href="{{ route('contact') }}">
                                Contact
                            </a>
                           
                        </li>
                    </ul>
                    
                    <div class="right">
                        <div class="action align-items-center">
                            
                            <a href="{{ route('reservation') }}" class="au-btn has-bd au-btn--hover">Booking now</a>

                            <div class="notify mr-0">
                                <img src="{{ asset('frontend') }}/images/notify.png" alt="">
                                <span class="notify-amount"> {{ total_count_cart() }}</span>
                
                                <!-- WIDGET SHOPPING -->
                                <div id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
                                    <div class="widget_shopping_cart_content">
                                        <ul class="woocommerce-mini-cart cart_list product_list_widget ">

                                        @php
                                            $sub_total = 0;
                                        @endphp

                                        @forelse (cart_items() as $cart_item)
                                            <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                                                <a href="{{ route('card.delete' , $cart_item->id) }}" class="remove remove_from_cart_button" aria-label="Remove this item">
                                                    <span class="lnr lnr-cross-circle"></span>
                                                </a>					    
                                                <a href="{{ route('food.details' , $cart_item->food->slug) }}" class="image-holder">
                                                    <img src="{{ asset('uploads/food_photos') }}/{{ $cart_item->food->image }}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
                                                    <span class="product-name">{{ $cart_item->food->food_name }}</span>
                                                </a>
                                                <span class="quantity"> 
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">$</span> {{ $cart_item->food->price }}
                                                    </span>
                                                    x {{ $cart_item->food_quantity }}
                                                </span>					
                                            </li>

                                            @php
                                                $sub_total += $cart_item->food_quantity * $cart_item->food->price;
                                            @endphp

                                        @empty
                                             No Cart Added
                                        @endforelse

                                        </ul>
                                        <p class="woocommerce-mini-cart__total total">
                                            <strong>Subtotal:</strong> 
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span> {{ $sub_total }}
                                            </span>
                                        </p>
                                        <p class="woocommerce-mini-cart__total total">
                                            <strong>Total:</strong> 
                                            <span class="woocommerce-Price-amount amount color-cdaa7c">
                                                <span class="woocommerce-Price-currencySymbol">$</span> {{ $sub_total }}
                                            </span>

                                            @php
                                                session(['sub_total' => $sub_total ]);
                                            @endphp


                                        </p>
                                        <p class="woocommerce-mini-cart__buttons buttons">
                                            <a href="{{ route('card.index') }}" class="button wc-forward view-cart">View cart</a>
                                            <a href="{{ route('checkout')}}" class="button checkout wc-forward">Checkout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                </nav>
    
                <!-- HEADER ON MOBILE -->
                <nav class="navbar-mobile">
                    <div class="container">
                        <div class="heading">
                            <div class="left">
                                <a href="#" class="navbar-mobile__toggler">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                            <a href="index.html" class="logo">
                                <img src="{{ asset('frontend') }}/images/logo.png" alt="Royate">
                            </a>
                            <div class="right">
                                <div class="action">
                                    <div class="notify">
                                        <img src="{{ asset('frontend') }}/images/notify.png" alt="">
                                        <span class="notify-amount">0</span>
                        
                                        <!-- WIDGET SHOPPING -->
                                        <div class="widget woocommerce widget_shopping_cart">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                    <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                                                        <a href="#" class="remove remove_from_cart_button" aria-label="Remove this item">
                                                            <span class="lnr lnr-cross-circle"></span>
                                                        </a>					    
                                                        <a href="#" class="image-holder">
                                                            <img src="{{ asset('frontend') }}/images/widget-cart-thumb-1.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
                                                            <span class="product-name">Best Brownies</span>
                                                        </a>
                                                        <span class="quantity"> 
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">$</span>18
                                                            </span>
                                                            x1
                                                        </span>					
                                                    </li>
                                                    <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                                                        <a href="#" class="remove remove_from_cart_button" aria-label="Remove this item">
                                                            <span class="lnr lnr-cross-circle"></span>
                                                        </a>					    
                                                        <a href="#" class="image-holder">
                                                            <img src="{{ asset('frontend') }}/images/widget-cart-thumb-2.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
                                                            <span class="product-name">Angela's Awesome</span>
                                                        </a>
                                                        <span class="quantity"> 
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">$</span>28
                                                            </span>
                                                            x3
                                                        </span>					
                                                    </li>
                                                </ul>
                                                <p class="woocommerce-mini-cart__total total">
                                                    <strong>Subtotal:</strong> 
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">$</span>102
                                                    </span>
                                                </p>
                                                <p class="woocommerce-mini-cart__total total">
                                                    <strong>Total:</strong> 
                                                    <span class="woocommerce-Price-amount amount color-cdaa7c">
                                                        <span class="woocommerce-Price-currencySymbol">$</span>102
                                                    </span>
                                                </p>
                                                <p class="woocommerce-mini-cart__buttons buttons">
                                                    <a href="#" class="button wc-forward view-cart">View cart</a>
                                                    <a href="#" class="button checkout wc-forward">Checkout</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>	
                                    <span class="lnr lnr-magnifier search-icon" data-toggle="modal" data-target="#modalSearch"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav id="main-nav">
                        <ul>
                            <li class="current">
                                <a href="#" target="_blank">Home</a>
                                <ul>
                                    <li>
                                        <a href="index.html">HomePage_v1</a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">HomePage_v2</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html">HomePage_v3</a>
                                    </li>
                                    <li class="current">
                                        <a href="index-4.html">HomePage_v4</a>
                                    </li>
                                    <li>
                                        <a href="index-5.html">HomePage_v5</a>
                                    </li>
                                    <li>
                                        <a href="index-6.html">HomePage_v6</a>
                                    </li>
                                    <li>
                                        <a href="index-7.html">HomePage_v7</a>
                                    </li>
                                    <li>
                                        <a href="index-8.html">HomePage_v8</a>
                                    </li>
                                    <li>
                                        <a href="index-9.html">HomePage_v9</a>
                                    </li>
                                    <li>
                                        <a href="index-10.html">HomePage_v10</a>
                                    </li>
                                    <li>
                                        <a href="index-11.html">HomePage_v11</a>
                                    </li>
                                    <li>
                                        <a href="index-12.html">HomePage_v12</a>
                                    </li>
                                    <li>
                                        <a href="index-13.html">HomePage_v13</a>
                                    </li>
                                    <li>
                                        <a href="index-14.html">HomePage_v14</a>
                                    </li>
                                    <li>
                                        <a href="index-15.html">HomePage_v15</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    Page
                                </a>
                                <ul>
                                    <li>
                                        <a href="about-us.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact-us.html">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="coming-soon.html">Coming Soon</a>
                                    </li>
                                    <li>
                                        <a href="#">Gallery</a>
                                        <ul>
                                            <li>
                                                <a href="gallery-three-columns.html">Three Colums</a>
                                            </li>
                                            <li>
                                                <a href="gallery-four-columns.html">Four Columns</a>
                                            </li>
                                            <li>
                                                <a href="gallery-three-columns-wide.html">Three Columns Wide</a>
                                            </li>
                                            <li>
                                                <a href="gallery-four-columns-wide.html">Four Colums Wide</a>
                                            </li>
                                            <li>
                                                <a href="masonry-grid.html">Masonry</a>
                                            </li>
                                            <li>
                                                <a href="masonry-wide.html">Masonry Wide</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="project.html">Project</a>
                                    </li>
                                    <li>
                                        <a href="meet-the-chefs.html">Meet The Cheefs</a>
                                    </li>
                                    <li>
                                        <a href="404.html">404</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="menu.html">
                                    Menu
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Reservation
                                </a>
                                <ul>
                                    <li>
                                        <a href="reservation_v1.html">Reservation_v1</a>
                                    </li>
                                    <li>
                                        <a href="reservation_v2.html">Reservation_v2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">
                                    Blog
                                </a>
                                <ul>
                                    <li>
                                        <a href="blog-masonry.html">Blog Masonry</a>
                                    </li>
                                    <li>
                                        <a href="blog-masonry-wide.html">Blog Masonry Wide</a>
                                    </li>
                                    <li>
                                        <a href="blog-standard-right-sidebar.html">Blog Standard Right Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="blog-standard-left-sidebar.html">Blog Standard Left Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="blog-standard-no-sidebar.html">Blog Standard No Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="blog-single.html">Blog Single</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">
                                    Shop
                                </a>
                                <ul>
                                    <li>
                                        <a href="shop-list.html">Shop List</a>
                                    </li>
                                    <li>
                                        <a href="shop-three-column.html">Three Columns Grid</a>
                                    </li>
                                    <li>
                                        <a href="shop-three-column-wide.html">Three Columns Wide</a>
                                    </li>
                                    <li>
                                        <a href="shop-four-column.html">Four Colums Grid</a>
                                    </li>
                                    <li>
                                        <a href="shop-four-column-wide.html">Four Colums Wide</a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html">Shop Cart</a>
                                    </li>
                                    <li>
                                        <a href="shop-single.html">Shop Single</a>
                                    </li>
                                    <li>
                                        <a href="sign-in.html">Sign In</a>
                                    </li>
                                    <li>
                                        <a href="sign-up.html">Sign Up</a>
                                    </li>
                                    <li>
                                        <a href="checkout.html">CheckOut</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </nav>
            
                <!-- MODAL SEARCH -->
                <div class="modal-search modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="get">
                                <input type="text" placeholder="Search">
                                <button>
                                    <span class="lnr lnr-magnifier"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <span class="lnr lnr-cross" data-toggle="modal" data-target="#modalSearch"></span>
                </div>
            </header>

            @yield('frontend_content')


        {{-- </div> --}}

		<footer>
			<!-- FOOTER TOP -->
			<div class="ft-top">
				<div class="container">
					<div class="ft-top-wrapper">
						<div class="ft-logo">
							<a href="index.html">
								<img src="{{ asset('frontend') }}/{{ asset('frontend') }}/images/logo.png" alt="">
							</a>
						</div>
						<div class="row justify-content-between justify-content-xl-start">
							<div class="col-md-3  ft-col">
								<h6>About Us</h6>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium doloremque laudantium, totam rem aperiam,</p>
							</div>
							<div class="col-md-5  col-xl-4 offset-xl-1 ft-col">
								<h6>Get news & offers</h6>
								<form method="get">
									<div class="form-inner">
										<input type="text" placeholder="Enter your mail">
										<button>
											<span class="lnr lnr-envelope"></span>
										</button>
									</div>
								</form>
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
							<div class="col-md-3 col-xl-2  ml-xl-auto ft-col">
								<h6>Contact Us</h6>
								<p>Zij Zahidul</p>
								<p>+88- 018-404-16-216</p>
								<p>safzahidul.cse@gmail.com</p>
								<p>zijpersonalportfolio.illuminetheme.com</p>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<div class="ft-bot">
				<div class="container">
					Copyright & 2021 Zij | All Rights Reserved.		
				</div>
			</div>
		</footer>

		<!-- CLICK TO TOP -->
		<div class="click-to-top">
		    <span class="lnr lnr-arrow-up"></span>
		</div>


    </div>

		<!-- jQUERY -->
		<script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('frontend') }}/vendor/bootstrap/bootstrap.min.js"></script>

		<!-- Slider Revolution core JavaScript files -->
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/jquery.themepunch.tools.min.js"></script>

        <!-- Slider Revolution extension scripts. ONLY NEEDED FOR LOCAL TESTING --> 
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.actions.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.carousel.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.kenburn.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.layeranimation.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.migration.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.navigation.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.parallax.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.slideanims.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/revolution-slider/js/revolution.extension.video.min.js"></script>

		<!-- CAROUSEL JS -->
		<script src="{{ asset('frontend') }}/vendor/owl-carousel/js/owl.carousel.min.js"></script>

		<!-- SWEET ALERT -->
		<script src="{{ asset('frontend') }}/js/sweetalert.min.js"></script>

		<!-- SIDENAV MOBILE -->
		<script src="{{ asset('frontend') }}/vendor/hcmobilenav/hc-mobile-nav.js"></script>

		<!-- LIGHT GALLERY -->
		<script src="{{ asset('frontend') }}/vendor/lightgallery/js/jquery.mousewheel.min.js"></script>
		<script src="{{ asset('frontend') }}/vendor/lightgallery/js/lightgallery-all.min.js"></script>

		<!-- JQUERY UI -->
		<script src="{{ asset('frontend') }}/vendor/jquery-ui/jquery-ui.min.js"></script>

		<!-- DATE-PICKER -->
		<script src="{{ asset('frontend') }}/vendor/date-picker/datepicker.js"></script>
		<script src="{{ asset('frontend') }}/vendor/date-picker/datepicker.en.js"></script>

		<!-- JQUERY TIMEPICKER -->
		<script src="{{ asset('frontend') }}/vendor/jquery-timepicker-master/jquery.timepicker.min.js"></script>

		<!-- WOW -->
        <script src="{{ asset('frontend') }}/js/wow.min.js"></script>

		<script src="{{ asset('frontend') }}/js/main.min.js"></script>
		<script src="https://kit.fontawesome.com/58e523b3cc.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        
        @yield('footer_scripts')

	</body>
</html>