@extends('layouts.frontend')

@section('frontend_content')
    <main>
        <!-- PAGE INFO -->
        <section class="page-info set-bg" data-image-src="{{ asset('frontend') }}/images/page-info-bg-4.jpg">
            <div class="section-header">
                <h1 class="text-white">Blog Masonry</h1>
                <span>~ The things you want to find ~</span>
            </div>
        </section>

        <section class="section-primary pt-150 pb-120 blog-masonry">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-lg-4">
                        <div class="post">
                            <div class="post-thumb">
                                <a href="blog-single.html">
                                    <img src="{{ asset('frontend') }}/images/post-thumb-4.jpg" alt="">
                                </a>
                                <div class="post-date">
                                    <div class="inner">
                                        <span class="date">28</span>
                                        <span class="month">June</span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-body has-border">
                                <h5>
                                    <a href="blog-single.html">
                                        On the other hand
                                    </a>
                                </h5>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis prae-sentium voluptatum deleniti atque.</p>
                                <a href="blog-single.html" class="au-btn__readmore">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>	
               						
            </div>
        </section>
    </main>
@endsection

		