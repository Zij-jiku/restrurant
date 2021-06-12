@extends('layouts.frontend')

@section('frontend_content')
<main id="contact-us-page">
    <!-- PAGE INFO -->
    <section class="page-info set-bg" data-image-src="{{ asset('frontend') }}/images/page-info-bg-1.jpg">
        <div class="section-header">
            <h1 class="text-white">Contact us</h1>
            <span>~ More than you know ~</span>
        </div>
    </section>

    <!-- CONTACT US -->
    <section class="contact-us section-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content">
                        <h3>Our office</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
                        <div class="contact-us-row row">
                            <div class="col-md-6">
                                <div class="contact-us-col">
                                    <h5>NewYork</h5>
                                    <div class="body">
                                        <div class="address">
                                            <span>No 40 Baria Sreet 133/2</span>
                                            <span>NewYork 13589</span>
                                        </div>
                                        <div class="contact-info">
                                            <a href="#">Email: kathryn-92@example.com</a>
                                            <a href="tel:8494904283">Phone: (849) 490 4283</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-us-col">
                                    <h5>Barcelona</h5>
                                    <div class="body">
                                        <div class="address">
                                            <span>184 Main Collins Street West 8007</span>
                                            <span>Barselona 23765</span>
                                        </div>
                                        <div class="contact-info">
                                            <a href="#">Email: kathryn-92@example.com</a>
                                            <a href="tel:8494904283">Phone: (849) 490 4283</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <div class="col-md-6">
                    <div class="contact-us-form">
                        <form action="includes/contact-form.php" method="post" class="js-contact-form">
                            <div class="form-holder">
                                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                            </div>
                            <div class="form-holder">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                            </div>
                            <div class="form-holder">
                                <textarea class="form-control" placeholder="Leave Message" name="message" required></textarea>
                            </div>
                            <button class="au-btn round has-bg medium au-btn--hover">Send message</button>
                        </form>
                    </div>
                </div>
            </div>				
        </div>
    </section>

    <!-- MAP -->
    <div class="js-google-map" data-makericon="{{ asset('frontend') }}/images/map-marker.png" data-makers='[["Royate", "Now that you visited our website,<br> how about checking out our office too?", 40.715681, -74.003427]]'>
        <div class="map__holder js-map-holder map-holder" id="map"></div>
    </div>
</main>
	
@endsection

		