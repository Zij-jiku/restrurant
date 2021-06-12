@extends('layouts.frontend')

@section('frontend_content')

	<main class="bg-dark"> 

		<!-- SLIDE SHOW -->
		<div class="rev_slider_wrapper mb-5">
			<div id="rev_slider_4" class="rev_slider" data-version="5.4.5">
				<ul> 
					<li data-transition="">
						<img src="{{ asset('frontend') }}/images/slideshow-5.jpg" class="rev-slidebg" alt="">

						<div class="tp-caption tp-resizeme caption-1" 
						data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-20px;opacity:0;","ease":"Power3.easeInOut"}]' 
						data-x="center" 
						data-y="middle" 
						data-fontsize="['22', '22', '22', '22', '22']" 
						data-voffset="['-64','-77', '-72', '-113', '-113']"
						data-lineheight="inherit" 
						data-color="#ccc"
						>
							Because you deserve to enjoy the best
						</div>

						<div class="tp-caption tp-resizeme caption-2" 
						data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-20px;opacity:0;","ease":"Power3.easeInOut"}]' 
						data-x="center" 
						data-y="middle" 
						data-fontsize="['99', '99', '99', '99', '99']" 
						data-voffset="['16','3', '8', '-33', '-33']"
						data-lineheight="inherit" 
						data-color="#fff"
						>
							nice dinner
						</div>

						<div class="tp-caption tp-resizeme caption-3" 
						data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:20px;opacity:0;","ease":"Power3.easeInOut"}]'
						data-x="center" 
						data-y="middle" 
						data-voffset="['142','129', '134', '93', '93']"
						data-width="['auto']"
						 data-height="['auto']"
						 data-type="image"
						>
							<img src="{{ asset('frontend') }}/images/cuisine-1956.png" alt=""
							data-ww="['320px', '320px', '320px', '320px', '320px']"
							data-hh="['59px', '59px', '59px', '59px', '59px']"
							>
						</div>

						<div class="rs-background-video-layer" 
						data-forcerewind="on" 
						data-volume="mute" 
						data-videowidth="100%" 
						data-videoheight="100%" 
						data-ytid="MHG3n_-Y33A" 
						data-videoattributes="version=3&enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0&
						 origin=http://www.youtube.com/" 
						data-videopreload="auto" 
						data-videorate="1" 
						data-forceCover="1" 
						data-videoloop="loopandnoslidestop" 
						data-aspectratio="16:9"
						data-videostartat="00:04" 
						data-videoendat="02:08"
						data-autoplay="on" 
						data-autoplayonlyfirsttime="true" 
						>	
						</div>
					 </li>
				</ul>
			</div>
		</div>

		<!-- CATE BOX -->
		<div class="cate-box mt-5">
			<div class="container-fluid">
				<div class="row">

					@forelse ($category_all as $category)
						
					
					<div class="col-md-6 col-xl-3">
						<a href="#" class="cate-box-item">
							<img src="{{ asset('uploads/category_photos') }}/{{ $category->image }}" alt="category_image">
							<div class="inner fixed-1">
								{{ $category->category_name }}
							</div>
						</a>
					</div>

					@empty

					<div class="col-md-6 col-xl-3">
						<a href="#" class="cate-box-item">
							<img src="{{ asset('frontend') }}/images/main-course-box.jpg" alt="">
							<div class="inner fixed-1">
								No Category
							</div>
						</a>
					</div>
						
					@endforelse

				</div>
			</div>
		</div>

		<!-- OUR STORY -->
		<section class="section-primary pt-150 our-story pb-0">
			<div class="container">
				@forelse ($about_all as $about)
					
			
				<div class="row">
					<div class="col-lg-6 px-lg-0 order-2 order-lg-1">
						<div class="our-story-primary style-2 fixed">
							<div class="interior">
								<div class="heading">
									<h2>Our Story</h2>
									<img src="{{ asset('frontend') }}/images/border-3.png" alt="" class="border-place">
								</div>
								<div class="body">
									<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</p>
									<div class="end">
										<img src="{{ asset('frontend') }}/images/signature-2.png" alt="">
										<div class="name">
											<h6>
												<a href="#">Harry Price</a>
											</h6>
											<span>Restaurant Owners</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 px-lg-0 order-1 order-lg-2">
						<div class="image-bg">
							<img src="{{ asset('frontend') }}/images/our-story-2.jpg" alt="">
						</div>
					</div>
				</div>

				@empty
					
				@endforelse


			</div>
		</section>

		<!-- SPECIALITIES -->
		<section class="section-primary special-slider pb-0">
			<div class="container-fluid">
				<div class="section-header">
					<h2 class="text-white">Specialties of the day</h2>
					<span>~ Delicious foods ~</span>
				</div>		
				<!-- OWL-CAROUSEL -->
				{{-- <div class="owl-carousel owl-theme style"> --}}

			    <div class="row">
					@forelse ($food_all as $food)
					<div class="col-lg-3">
						<div class="item">
							<div class="special-item item-box">
								<a href="{{ route('food.details' , $food->slug) }}" class="thumb">
									<img src="{{ asset('uploads/food_photos') }}/{{ $food->image }}" alt="">
								</a>
								<div class="item-info">
									<h5>
										<a href="{{ route('food.details' , $food->slug) }}" style="color: #cdaa7c !important">{{ $food->food_name }}</a>
									</h5>
									<div class="star-rating">
										<i class="zmdi zmdi-star"></i>
										<i class="zmdi zmdi-star"></i>
										<i class="zmdi zmdi-star"></i>
										<i class="zmdi zmdi-star"></i>
										<i class="zmdi zmdi-star"></i>
									</div>
									<span class="price">
										<span>$</span>{{ $food->price }}
									</span>
								</div>
							</div>
						</div>
					</div>

					@empty

					<div class="item">
						<div class="special-item item-box">
							
							<div class="item-info">
								<h5>
									<a href="#" class="text-dark">No Food Available</a>
								</h5>
								
							</div>
						</div>
					</div>
						
					@endforelse
					
				</div>
				
				{{-- </div> --}}
					
			</div>
		</section>

		<!-- OUR FOOD MENU -->
		<section class="our-menu bg-none section-primary pt-133 pb-101">
			<div class="container">
				<div class="section-header">
					<h2 class="text-white">Our food menu</h2>
					<span>~ See what we offer ~</span>
				</div>	
				<div id="tabs">
					<div class="row menu-navigation color-e5e5e5 mb-53">
						<div class="fix-col mx-auto">
							<ul>

								@foreach ($categories_info as $categorie)
									<li>
										<a href="#category_id_{{ $categorie->id }}" class="active">
											<img src="{{ asset('frontend') }}/images/main-course-square.png" alt="">
											<span>{{ $categorie->category_name }}</span>
										</a>
									</li>
							   @endforeach


							</ul>
						</div>
					</div>
					
					@foreach ($categories_info as $categorie)

					<div id="category_id_{{ $categorie->id }}">
						<div class="row justify-content-center justify-content-xl-between">

							@foreach ($categorie->relation_with_product_table as $single_product)

							<div class="col-md-11 col-lg-10 col-xl-6 menu-holder left fixed">
								<a href="{{ route('food.details' , $food->slug) }}" class="menu-thumb">
									<img src="{{ asset('uploads/food_photos') }}/{{ $single_product->image }}" alt="" style="width: 84px ; height: 84px">
								</a>
								<div class="menu-item">
									<h5 class="color-fff">
										<a href="{{ route('food.details' , $food->slug) }}">{{ $single_product->food_name }}</a>
										<span class="dots"></span>
										<span class="price">
											<span>$</span>
											{{ $single_product->price }}
										</span>
									</h5>
									<ul>
										<li>
											<a href="#">Tag Name (Comming Soon)</a>
										</li>
									
									</ul>
								</div>
							</div>

							@endforeach
							
						</div>
					</div>

					@endforeach
				
				</div>
			</div>
		</section>

		<!-- GALLERY GRID-->
		<section class="gallery">
			<div class="container-fluid">
				<div class="section-header">
					<h2 class="text-white">Photo Gallery</h2>
					<span>~ Our restaurant  ~</span>
				</div>	
				<div class="gallery-grid has-gutter lightgallery">
					<div class="gallery-item" data-src="{{ asset('frontend') }}/images/galerry-1.jpg">
						<a href="#" class="thumb">
							<img src="{{ asset('frontend') }}/images/galerry-1.jpg" alt="">
							<i class="fas fa-arrows-alt "></i>
						</a>
					</div>
					<div class="gallery-item" data-src="{{ asset('frontend') }}/images/gallery-4.jpg">
						<a href="#" class="thumb">
							<img src="{{ asset('frontend') }}/images/gallery-4.jpg" alt="">
							<i class="fas fa-arrows-alt "></i>
						</a>
					</div>
					<div class="gallery-item" data-src="{{ asset('frontend') }}/images/gallery-6.jpg">
						<a href="#" class="thumb fix-image">
							<img src="{{ asset('frontend') }}/images/gallery-6.jpg" alt="">
							<i class="fas fa-arrows-alt "></i>
						</a>
					</div>
					<div class="gallery-item" data-src="{{ asset('frontend') }}/images/gallery-2.jpg">
						<a href="#" class="thumb">
							<img src="{{ asset('frontend') }}/images/gallery-2.jpg" alt="">
							<i class="fas fa-arrows-alt "></i>
						</a>
					</div>
					<div class="gallery-item" data-src="{{ asset('frontend') }}/images/gallery-3.jpg">
						<a href="#" class="thumb">
							<img src="{{ asset('frontend') }}/images/gallery-3.jpg" alt="">
							<i class="fas fa-arrows-alt "></i>
						</a>
					</div>
					<div class="gallery-item" data-src="{{ asset('frontend') }}/images/gallery-5.jpg">
						<a href="#" class="thumb">
							<img src="{{ asset('frontend') }}/images/gallery-5.jpg" alt="">
							<i class="fas fa-arrows-alt "></i>
						</a>
					</div>
				</div>
			</div>
		</section>

		<!-- OUR TALENTED CHEF -->
		<section class="section-primary our-chef-slider">
			<div class="container">
				<div class="section-header">
					<h2 class="text-white">Our talented chef</h2>
					<span>~ Experience & Enthusiasm ~</span>
				</div>		
				<!-- OWL-CAROUSEL -->
				<div class="owl-carousel owl-theme style" id="our-chef-carousel">

					@foreach ($chep_info as $chep)
						<div class="item">
							<div class="our-chef-item">
								<img src="{{ asset('uploads/chep_photos') }}/{{ $chep->image }}" alt="">
								<div class="info">
									<div class="inner">
										<h6>
											<a href="">{{ $chep->chep_name }}</a>
										</h6>
										<span>{{ $chep->position }}</span>
										<div class="social">
											<a href="{{ $chep->s_one }}">
												<i class="zmdi zmdi-twitter"></i>
											</a>
											<a href="{{ $chep->s_two }}">
												<i class="zmdi zmdi-facebook-box"></i>
											</a>
											<a href="{{ $chep->s_three }}">
												<i class="zmdi zmdi-linkedin"></i>
											</a>
											<a href="{{ $chep->s_four }}">
												<i class="zmdi zmdi-instagram"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach

				</div>	
			</div>
		</section>

		<!-- WISH -->
		{{-- <section class="wish">
			<div class="content">
				<h3>Table set has beautiful views</h3>
				<p>Wish you have a good meal!</p>
				<a href="#" class="au-btn round has-bd au-btn--hover">Book Now</a>
			</div>
		</section> --}}

		<!-- FORM -->
		<section class="section-primary section-form pb-120" id = "booking_now">
			<div class="container">
				<div class="section-header">
					<h2 class="text-white">Book a table</h2>
					<span>~ Check out our place ~</span>
				</div>	

				<form method="post" action="{{ route('tablebook.store') }}">
					@csrf

					<div class="form-inner">
						<div class="form-col">
							<div class="select">
								<div class="form-holder">
									<input type="number" class="form-control" data-language='en' placeholder="People" name="people" value="{{ old('people') }}">

									@error ('people')
										<span class = "text-danger">{{ $message }}</span>
								    @enderror

								</div>
								
							</div>
						</div>
						<div class="form-col">
							<div class="form-holder">
								<input type="date" class="form-control" data-language='en' placeholder="Date" name="date" value="{{ old('date') }}">
								  @error ('date')
										<span class = "text-danger">{{ $message }}</span>
									@enderror
									
								<span class="lnr lnr-calendar-full big"></span>
							</div>
						</div>
						<div class="form-col">
							<div class="form-holder">
								<input type="time" class="form-control" placeholder="Time" name="time" value="{{ old('time') }}">
								  @error ('time')
										<span class = "text-danger">{{ $message }}</span>
									@enderror
									
								<span class="lnr lnr-clock big"></span>
							</div>
						</div>
						<div class="form-col">
							<div class="form-holder">
								<input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
								  @error ('name')
										<span class = "text-danger">{{ $message }}</span>
									@enderror
									
							</div>
						</div>
						<div class="form-col">
							<div class="form-holder">
								<input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}">
								  @error ('phone')
										<span class = "text-danger">{{ $message }}</span>
									@enderror
									
							</div>
						</div>
						<div class="form-col">
							<div class="form-holder">
								<input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
								  @error ('email')
										<span class = "text-danger">{{ $message }}</span>
									@enderror
									
							</div>
						</div>
					</div>
					<div class="btn-holder">
						<button type="submit" class="au-btn round has-bd bd-999 au-btn--hover">Book now</button>
					</div>
				</form>			
			</div>
		</section>

		<!-- PARTNER -->
		<div class="partner bg-2c">
			<div class="container-fluid">
				<div class="row justify-content-around text-center">
					<div class="col-6 col-md">
						<a href="#" class="image-holder">
							<img src="{{ asset('frontend') }}/images/partner-2.png" alt="" class="wow zoomIn" data-wow-delay="0.3s">
						</a>
					</div>
					<div class="col-6 col-md">
						<a href="#" class="image-holder">
							<img src="{{ asset('frontend') }}/images/partner-3.png" alt="" class="wow zoomIn" data-wow-delay="0.5s">
						</a>
					</div>
					<div class="col-6 col-md">
						<a href="#" class="image-holder">
							<img src="{{ asset('frontend') }}/images/partner-4.png" alt="" class="wow zoomIn" data-wow-delay="0.7s">
						</a>
					</div>
					<div class="col-6 col-md">
						<a href="#" class="image-holder">
							<img src="{{ asset('frontend') }}/images/partner-5.png" alt="" class="wow zoomIn" data-wow-delay="0.9s">
						</a>
					</div>
					<div class="col-6 col-md">
						<a href="#" class="image-holder">
							<img src="{{ asset('frontend') }}/images/partner-6.png" alt="" class="wow zoomIn" data-wow-delay="1.1s">
						</a>
					</div>
				</div>		
			</div>
		</div>
	</main>
@endsection

		