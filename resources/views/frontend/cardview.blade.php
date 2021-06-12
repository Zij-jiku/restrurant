@extends('layouts.frontend')

@section('frontend_content')

<main>

      <!-- PAGE INFO -->
        <section class="page-info set-bg" data-image-src="{{ asset('frontend') }}/images/page-info-bg-3.jpg">
            <div class="section-header">
                <h1 class="text-white">Cart View Page</h1>
            </div>
        </section>


    <!-- PAGE BREADCRUMB -->
    <section class="page-breadcrumb">
        <div class="container">
            <div class="row justify-content-between align-content-center">
                <div class="col-md-auto">
                    <h3>Cart</h3>
                </div>
                <div class="col-md-auto">
                    <ul class="au-breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="shop-cart.html">Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- SHOP CART -->
    <div class="section-primary shop-cart pt-120 pb-101">
        <div class="container">
            <div class="woocommerce">
              

                <form action="{{ route('cart.update') }}" method="post" class="woocommerce-cart-form">
                        @csrf


                    <table class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $sub_total = 0;
                                $flag = 0;
                            @endphp

                            @forelse (cart_items() as $cart_item)

                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                <td class="product-remove">
                                    <a href="{{ route('card.delete' , $cart_item->id) }}" class="remove" aria-label="Remove this item">
                                        <span class="lnr lnr-cross-circle"></span>
                                    </a>		
                                </td>

                                <td class="product-thumbnail">
                                    <a href="">
                                        <img src="{{ asset('frontend') }}/images/shop-cart-1.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" />
                                    </a>						
                                </td>

                                <td class="product-name" data-title="Product">
                                    <a href="{{ route('food.details' , $cart_item->food->slug) }}">{{ $cart_item->food->food_name }}</a>	
                                </td>

                                <td class="product-price" data-title="Price">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span> {{ $cart_item->food->price }} </span>	
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <input type="number" class="input-text qty text input-quantity" step="1" min="0" name="food_quantity[{{ $cart_item->id }}]" value="{{  $cart_item->food_quantity }}" title="Qty" size="4">

                                        <div class="icon">
                                            <a href="#" class="number-button plus">+</a>
                                            <a href="#" class="number-button minus">-</a>
                                        </div>
                                    </div>
                                </td>

                                @php
                                  $sub_total += $cart_item->food_quantity * $cart_item->food->price;
                                @endphp


                                <td class="product-subtotal" data-title="Total">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span> {{ $cart_item->food_quantity * $cart_item->food->price }} </span>		
                                </td>
                            </tr>

                            @empty
                                 No Added Cart
                            @endforelse



                          
                            <tr>
                                <td class="product-remove none">&nbsp;</td>
                                <td colspan="3" class="actions">
                                    <div class="coupon">
                                        <input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="coupon code" /> 
                                        <input type="submit" class="button au-btn" name="apply_coupon" value="Apply" />
                                    </div>
                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="54045be64c" />
                                </td>
                                <td colspan="2" class="cart-subtotal">
                                    <label>Subtotal:</label>
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span> {{ $sub_total }}

                                        @php
                                          session(['sub_total' => $sub_total ]);
                                        @endphp


                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <div class="bottom">
                        <input type="submit" class="button au-btn update-btn has-bd bd-999 round" name="update_cart" value="Update cart" />
                        <a href="{{ route('checkout')}}" class=" au-btn go-shopping round has-bg au-btn--hover">Go to Checkout</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

		