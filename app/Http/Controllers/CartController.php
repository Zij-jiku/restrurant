<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    function cartstore(Request $request)
    {
      if(Cookie::get('g_cart_id')){
        $generator_cart_id = Cookie::get('g_cart_id');
      }
      else {
        $generator_cart_id = Str::random(5).rand(2,1000);
        Cookie::queue('g_cart_id' , $generator_cart_id , 1440);
      }
     if(Cart::where('generator_cart_id' , $generator_cart_id)->where('food_id' , $request->food_id)->exists()){
       Cart::where('generator_cart_id' , $generator_cart_id)->where('food_id' , $request->food_id)->increment('food_quantity' , $request->food_quantity);
     }
     else {
       Cart::insert([
         'generator_cart_id' => $generator_cart_id,
         'food_id' => $request->food_id,
         'food_quantity' => $request->food_quantity,
         'created_at' => Carbon::now(),
       ]);
     }
     return back();
    }


    function cardindex($coupon_name = "")
    {
      $error_message = "";
      $discount_percent = 0;
      if($coupon_name == ''){
        $error_message = "";
      }
      else {
        if(!Coupon::where('coupon_name' , $coupon_name)->exists()){
          $error_message = "This coupon dose not match";
        }
        else {
          if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name' , $coupon_name)->first()->validity_till){
            $error_message = "This coupon Date Over";
          }
          else {
            $sub_total = 0;
            foreach (cart_items() as $single_cart) {
              $sub_total += $single_cart->food->food_price * $single_cart->food_quantity;
            }
            if(Coupon::where('coupon_name' , $coupon_name)->first()->min_purchase_amount > $sub_total){
              $error_message = "You Have to shop more than or equal ".Coupon::where('coupon_name' , $coupon_name)->first()->min_purchase_amount;
            }
            else {
              $discount_percent = Coupon::where('coupon_name' , $coupon_name)->first()->discount_percent;
            }
          }
        }
      }
    //   $valid_coupon = Coupon::whereDate('validity_till' , '>=' , Carbon::now()->format('Y-m-d'))->get();
    // compact('discount_percent' , 'error_message' , 'coupon_name' ,'valid_coupon')
      return view('frontend.cardview');
    }

    

    function cartupdate(Request $request)
    {
      foreach ($request->food_quantity as $cart_id => $food_quantity) {
        Cart::findOrFail($cart_id)->update([
          'food_quantity' => $food_quantity
        ]);
      }
      return back()->with('update_status' , 'Your Update Successfully!!');
    }

    function cartdestroy($cart_id)
    {
      Cart::findOrFail($cart_id)->forceDelete();
      return back()->with('delete_status' , 'ID '.$cart_id.' Delete Successfully!');
    }

    
}
