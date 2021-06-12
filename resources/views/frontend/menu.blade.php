@extends('layouts.frontend')

@section('frontend_content')

    <main>
        <!-- PAGE INFO -->
        <section class="page-info set-bg" data-image-src="{{ asset('frontend') }}/images/page-info-bg-3.jpg">
            <div class="section-header">
                <h1 class="text-white">Our menu</h1>
                <span>~ See what we offe ~</span>
            </div>
        </section>

        <!-- MAIN COURSE -->
        <section class="section-primary menu-page pb-120">
            <div class="container">
                <div class="section-header">
                    <h2>Main Dish</h2>
                    <span>~ Qualities in each dish ~</span>
                </div>	
                <div class="row">

                    @forelse ($food_info as $food)

                        <div class="col-md-6 menu-holder left">
                            <a href="{{ route('food.details' , $food->slug) }}" class="menu-thumb">
                                <img src="{{  asset('uploads/food_photos')  }}/{{ $food->image }}" alt="" class="img-fluid" style="width: 87px; height: 87px">
                            </a>
                            <div class="menu-item">
                                <h5 class="bold-color">
                                    <a href="{{ route('food.details' , $food->slug) }}">{{ $food->food_name }}</a>
                                    <span class="dots"></span>
                                    <span class="price">
                                        <span>$</span>
                                        {{ $food->price }}
                                    </span>
                                </h5>
                                <ul>
                                    <li>
                                        <a href="{{ route('food.details' , $food->slug) }}">{{ $food->tag_name }}<</a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>

                    @empty
                     No Food Available
                    @endforelse



                </div>	
            </div>
        </section>

        <!-- SOUPS AND SALADS -->
        <section class="menu-block-bg set-bg" data-image-src="{{ asset('frontend') }}/images/menu-block-bg.jpg">
            <div class="section-header">
                <h2 class="text-white">Soups & salads</h2>
                <span>~ Clean vegetables  ~</span>
            </div>
        </section>

        <section class="section-primary menu-page pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-17.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Grandma's Noodle Soup</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    26
                                </span>
                            </h5>
                            <p>It is a long established fact that a reader will be distracted</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-18.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Cran-Broccoli Salad</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    28
                                </span>
                            </h5>
                            <p>There are many variations of passages of Lorem Ipsum</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-19.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Vegan Red Lentil Soup</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    32
                                </span>
                            </h5>
                            <p>The point of using Lorem Ipsum is that it has a more</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-20.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Spinach and Mushroom Salad</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    17
                                </span>
                            </h5>
                            <p>If you are going to use a passage of Lorem Ipsum</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-21.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Beef Noodle Soup</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    21
                                </span>
                            </h5>
                            <p>Many desktop publishing packages and web</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-22.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Holiday Chicken Salad</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    12
                                </span>
                            </h5>
                            <p>All the Lorem Ipsum generators on the Internet tend </p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left mb-md-0">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-23.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Italian Sausage Soup</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    14
                                </span>
                            </h5>
                            <p>Various versions have evolved over the years</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right mb-0">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-24.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Kale and Feta Salad</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    30
                                </span>
                            </h5>
                            <p>It uses a dictionary of over 200 Latin words, combined</p>
                        </div>
                    </div>
                </div>	
            </div>
        </section>

        <!-- DRINKS -->
        <section class="menu-block-bg set-bg" data-image-src="{{ asset('frontend') }}/images/menu-block-bg-2.jpg">
            <div class="section-header">
                <h2 class="text-white">Drinks</h2>
                <span>~ Attractive drinks ~</span>
            </div>
        </section>

        <section class="section-primary menu-page pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-25.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Beer Margaritas</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    25
                                </span>
                            </h5>
                            <p>Mocha Sauce, with Whipped Cream, Steamed</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-26.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Al's Bloody Marys</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    23
                                </span>
                            </h5>
                            <p>A shot of espresso with a rich flavour and caramel</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-27.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Best Lemonade Ever</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    18
                                </span>
                            </h5>
                            <p>Expertly steamed milk poured over two shots</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-28.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Homemade Caramel Latte</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    31
                                </span>
                            </h5>
                            <p>Espresso shots are topped with hot water produce</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-29.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Caramel Macchiato</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    14
                                </span>
                            </h5>
                            <p>A mix of vanilla flavour and steamed milk marked</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-30.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Zesty Celery Sour</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    29
                                </span>
                            </h5>
                            <p>Your favourite Latte is mixed with Turmeric. </p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left mb-md-0">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-31.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Apple Orchard Punch</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    23
                                </span>
                            </h5>
                            <p>Two ristretto shots topped with warm, silky milk</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right mb-0">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-32.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Luscious Slush Punch</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    34
                                </span>
                            </h5>
                            <p>Cold milk foam topped with a slightly sweetened</p>
                        </div>
                    </div>
                </div>	
            </div>
        </section>

        <!-- DESERTS -->
        <section class="menu-block-bg set-bg" data-image-src="{{ asset('frontend') }}/images/menu-block-bg-3.jpg">
            <div class="section-header">
                <h2 class="text-white">Desserts</h2>
                <span>~ Sweet spread   ~</span>
            </div>
        </section>

        <section class="section-primary menu-page pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-33.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Tokyo cheese cake</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    07
                                </span>
                            </h5>
                            <p>The generated Lorem Ipsum is therefore always</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-34.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Butter raisins cake</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    31
                                </span>
                            </h5>
                            <p>Excepteur sint occaecat cupidatat non proiden</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-35.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Delicacy Coconut cake</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    11
                                </span>
                            </h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-36.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Donut chocolate</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    25
                                </span>
                            </h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-37.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Gateaux de basque</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    18
                                </span>
                            </h5>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-38.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Rainbow macaron</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    17
                                </span>
                            </h5>
                            <p>Ut enim ad minima veniam, quis nostrum exercitatione</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder left mb-md-0">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-39.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Spong cake cup </a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    29
                                </span>
                            </h5>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit</p>
                        </div>
                    </div>
                    <div class="col-md-6 menu-holder right mb-0">
                        <a href="shop-single.html" class="menu-thumb">
                            <img src="{{ asset('frontend') }}/images/menu-thumb-40.png" alt="">
                        </a>
                        <div class="menu-item">
                            <h5 class="bold-color">
                                <a href="shop-single.html">Alpha chocolate</a>
                                <span class="dots"></span>
                                <span class="price">
                                    <span>$</span>
                                    24
                                </span>
                            </h5>
                            <p>Quis autem vel eum iure reprehenderit qui in ea</p>
                        </div>
                    </div>
                </div>	
            </div>
        </section>
    </main>
@endsection

		