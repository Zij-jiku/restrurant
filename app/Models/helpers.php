<?php


  function total_count_food(){
    return App\Models\Food::count();
  }

  function total_count_cart(){
    return App\Models\Cart::where('generator_cart_id' , Cookie::get('g_cart_id'))->count();
  }

  function cart_items(){
    return App\Models\Cart::where('generator_cart_id' , Cookie::get('g_cart_id'))->get();
  }
  function product(){
    return App\Models\Food::all();
  }

  function review_customer_count($food_id){
    return App\Models\OrderDetail::where('food_id' , $food_id)->whereNotNull('review')->count();
  }

  function average_stars($product_id){
    $total_count = App\Models\OrderDetail::where('product_id' , $product_id)->whereNotNull('review')->count();
    $total_sum = App\Models\OrderDetail::where('product_id' , $product_id)->whereNotNull('review')->sum('stars');
    
    if($total_sum == 0){
      return 0;
    }
    else {
      return round($total_sum/$total_count);
    }
  }

  function total_alert_products(){
    return DB::table('products')->whereRaw('alert_quantity >= product_quantity')->count();
  }

  // wishList Items and counter starts
  function wish_items(){
    return App\Models\Wishilist::where('generated_wish_id', Cookie::get('g_wish_id'))->get();
  }

  function wish_count(){
      return App\Models\Wishilist::where('generated_wish_id', Cookie::get('g_wish_id'))->count();
  }
  // wishList Items and counter ends
  

