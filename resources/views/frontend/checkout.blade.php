@extends('layouts.frontend')

@section('frontend_content')

    <main>

        <!-- PAGE INFO -->
			<section class="page-info set-bg" data-image-src="{{ asset('frontend') }}/images/page-info-bg-3.jpg">
				<div class="section-header">
					<h1 class="text-white">Check Out Page</h1>
				</div>
			</section>

        <!-- PAGE BREADCRUMB -->
			<section class="page-breadcrumb">
				<div class="container">
					<div class="row justify-content-between align-content-center">
						<div class="col-md-auto">
							<h3>CheckOut</h3>
						</div>
						<div class="col-md-auto">
							<ul class="au-breadcrumb">
								<li>
									<a href="{{ url('/') }}">Home</a>
								</li>
								<li>
									<a href="#">My Account</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
        
        <!-- SHOPPING CHECKOUT -->
        <section class="checkout-page section-primary pt-120">
            <div class="container">
                <div class="woocommerce">
                    <div class="woocommerce-info-wrapper">
                        <div id="accordion">
                            <div class="woocommerce-info">
                                <img src="{{ asset('frontend') }}/images/returning-customer.png" alt="">
                                Returning customer?
                                <a href="#" data-toggle="collapse" data-target="#collapseOne" id="headingOne"> Click here to login</a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <form method="get" class="woocommerce-form woocommerce-form-login login">
                                    <div class="form-holder">
                                        <label for="username">Username or email address <span class="required">*</span></label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" value="">
                                    </div>
                                    <div class="form-holder">
                                        <label for="password">Password <span class="required">*</span></label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password">
                                    </div>
                                    <div class="form-holder last">
                                        <input type="submit" class="woocommerce-Button button au-btn round has-bg" name="login" value="Login">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> 
                                            Remember me
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <p class="woocommerce-LostPassword lost_password">
                                        <a href="#">Lost your password?</a>
                                    </p>
                                </form>
                            </div>
                            <div class="woocommerce-info">
                                <img src="{{ asset('frontend') }}/images/have-a-coupon.png" alt="">
                                Have a coupon?
                                <a href="#" data-toggle="collapse" data-target="#collapseTwo" id="headingTwo"> Click here to enter your code</a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <form class="checkout_coupon" method="post">
                                    <p class="form-row form-row-first">
                                        <input type="text" name="coupon_code" class="form-control" placeholder="Coupon code" id="coupon_code" value="">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <input type="submit" class="button au-btn has-bg round" name="apply_coupon" value="Apply coupon">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form action="{{ url('checkout/post') }}" method="POST" class="checkout woocommerce-checkout">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="woocommerce-billing-fields">
                                    <h5>Billing Details</h5>
                                    <div class="woocommerce-billing-fields__field-wrapper">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                    <label for="billing_first_name">First Name 
                                                        <span  class="required" title="required">*</span>
                                                    </label>
                                                    <input class="form-control" type="text" name="billing_first_name" id="billing_first_name">
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                    <label for="billing_last_name">Last Name 
                                                        <span  class="required" title="required">*</span>
                                                    </label>
                                                    <input class="form-control" type="text" name="billing_last_name" id="billing_last_name">
                                                </p>
                                            </div>
                                        </div>

                                        <p class="form-row form-row-wide" id="billing_company_field">
                                            <label for="billing_company" class="">Company name</label>
                                            <input type="text" class="form-control" name="billing_company" id="billing_company" autocomplete="organization">
                                        </p>

                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                            <label for="billing_country">Country 
                                                <span class="required" title="required">*</span>
                                            </label>
                                            <select id="select_id_one" name = "country_id" class="form-control" autocomplete="organization">
                                                @foreach ($countries as $country)
                                                   <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>     
                                        </p>

                                        <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                            <label for="billing_city" class="">Town / City  
                                                <span class="required" title="required">*</span>
                                            </label>

                                            <select id="select_id_two" name = "city_id" class="form-control">
                                                <option value="1">Select Country</option>
                                            </select>
                                        </p>

                                        <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                            <label for="billing_address_1" class="">Address 
                                                <span class="required" title="required">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="billing_address_1" id="billing_address_1" placeholder="Street Address" value="" autocomplete="address-line1">
                                            <input type="text" class="form-control" name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)" value="" autocomplete="address-line1">
                                        </p>
                                      
                                        <p class="form-row form-row-wide address-field validate-postcode" id="billing_postcode_field" data-priority="65" data-o_class="form-row form-row-wide address-field validate-postcode">
                                            <label for="billing_postcode" class="">Postcode / ZIP 
                                                <span class="required" title="required">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="postal-code">
                                        </p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                    <label for="billing_phone" class="">Phone 
                                                        <span class="required" title="required">*</span>
                                                    </label>
                                                    <input type="tel" class="form-control" name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel">
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                                                    <label for="billing_email" class="">Email address 
                                                        <span class="required" title="required">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" name="billing_email" id="billing_email" placeholder="" value="">
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="woocommerce-account-fields">
                                            <p class="form-row form-row-wide create-account woocommerce-validated">
                                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" type="checkbox" name="createaccount" value="1"> 
                                                    <span>Create an account?</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </p>
                                        </div>

                                        <div class="woocommerce-additional-fields">
                                            <h5>Additional information</h5>
                                            <div class="woocommerce-additional-fields__field-wrapper">
                                                <p class="form-row notes" id="order_comments_field" data-priority="">
                                                    <label for="order_comments" class="">Order notes</label>
                                                    <textarea name="order_comments" class="form-control" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                </p>						
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="woocommerce-checkout-review-order-wrap">
                                    <h5 id="order_review_heading">Your order</h5>

                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <tbody>


                                      
                                        @forelse (cart_items() as $cart_item)

                                        <tr class="cart_item">
                                            <td class="product-name">
                                                <img src="{{ asset('uploads/food_photos') }}/{{ $cart_item->food->image }}" alt="">
                                                <div class="review-wrap">
                                                    <span class="rv-titel">{{ $cart_item->food->food_name }}</span>
                                                    <span class="product-quantity">x {{ $cart_item->food_quantity }}</span>
                                                </div>
                                            </td>
                                            <td class="product-total">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span> {{ $cart_item->food_quantity * $cart_item->food->price }}
                                                </span>                
                                            </td>
                                        </tr>
                                   
                                        @empty
                                             No Cart Added
                                        @endforelse

                                            </tbody>
                                        </table>
                                        <div class="cart-total">
                                            <div class="cart-subtotal">
                                                <p>
                                                    <span class="title">Subtotal</span>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">$</span> {{ session('sub_total') }}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="shipping">
                                                <p>
                                                    <span class="title">Shipping</span>
                                                    there are no shipping methods available. please double check your address, or contact us if you need any help.
                                                </p>
                                            </div>
                                            <div class="order-total">
                                                <p>
                                                    <span class="title">Total</span>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">$</span> {{ session('sub_total') }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>

                                        <div id="payment" class="woocommerce-checkout-payment">
                                            <ul class="wc_payment_methods payment_methods methods" id="accordion-1">
                                                <li class="wc_payment_method payment_method_cheque">
                                                    <label for="payment_method_cheque"  data-toggle="collapse" data-target="#collapseOne-1" id="headingOne-1">
                                                        <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_option" value="1" data-order_button_text="" checked>
                                                        Check payments
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <div id="collapseOne-1" class="collapse show" data-parent="#accordion-1">
                                                        <div class="payment_box payment_method_cheque">
                                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="wc_payment_method payment_method_cod">
                                                    <div class="paypal">
                                                        <label for="payment_method_cod"  data-toggle="collapse" data-target="#collapseTwo-1" id="headingTwo-1">
                                                            <input id="payment_method_cod" type="radio" class="input-radio" name="payment_option" value="cod" data-order_button_text="">
                                                            Paypal
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <div class="payment_box payment_method_cod">
                                                            <img src="{{ asset('frontend') }}/images/paypal.png" alt="">
                                                            <a href="#">What is paypal?</a>
                                                        </div>
                                                    </div>
                                                    <div id="collapseTwo-1" class="collapse" data-parent="#accordion-1">
                                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-row place-order">
                                                <input type="submit" class="button alt au-btn round has-bg" id="place_order" value="Place order" data-value="Place order">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </main>
@endsection

@section('footer_scripts')
 <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#select_id_one').select2();
        $('#select_id_two').select2();

        $('#select_id_one').change(function(){
            var country_id = $(this).val();

        // Ajax Start
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
        type:'POST',
        url:'/ajaxRequest',
        data:{country_id:country_id},
        success:function(data){
            $('#select_id_two').html(data)
        }
        });
        // Ajax End
        });

    });
 </script>




@endsection
