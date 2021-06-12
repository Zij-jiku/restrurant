<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Billing;
use App\Models\Country;
use App\Models\Food;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function checkout()
    {
        return view('frontend.checkout' , [
            'user' => User::find(Auth::id()),
            'countries' => Country::all(),
        ]);
    }

    public function ajaxRequest(Request $request)
    {
      $stringToSent = "";
      $cities = City::where('country_id' , $request->country_id)->get();
      foreach($cities as $city){
         $stringToSent .=  "<option value='".$city->id."'>".$city->name."</option>";
      }
      return $stringToSent;
    }

   

    function checkoutpost(Request $request)
    {
    //   $request->validate([
    //     'name' => 'required',
    //     'email' => 'required',
    //     'phone_number' => 'required',
    //     'country_id' => 'required',
    //     'city_id' => 'required',
    //     'address' => 'required',
    //   ]);

    
      $billing_id = Billing::insertGetId([
        'billing_first_name' => $request->billing_first_name,
        'billing_last_name' => $request->billing_last_name,
        'billing_company' => $request->billing_company,
        'country_id' => $request->country_id,
        'city_id' => $request->city_id,
        'billing_address_1' => $request->billing_address_1,
        'billing_address_2' => $request->billing_address_2,
        'billing_postcode' => $request->billing_postcode,
        'billing_phone' => $request->billing_phone,
        'billing_email' => $request->billing_email,
        'createaccount' => $request->createaccount,
        'address' => $request->address,
        'order_comments' => $request->order_comments,
        'created_at' => Carbon::now(),
      ]);

      $order_id = Order::insertGetId([
        'user_id' => Auth::id(),
        'sub_total' => session('sub_total'),
        'discount_amount' => session('discount_amount'),
        'coupon_name' => session('coupon_name'),
        'total' => session('sub_total'),
        'payment_option' => $request->payment_option,
        'billing_id' => $billing_id,
        'created_at' => Carbon::now(),
      ]);

      foreach(cart_items() as $cart_item){
        OrderDetail::insert([
          'order_id' => $order_id,
          'user_id' => Auth::id(),
          'food_id' => $cart_item->food_id,
          'food_quantity' => $cart_item->food_quantity,
          'food_price' => $cart_item->food->price,
          'created_at' => Carbon::now(),
        ]);
        Food::find($cart_item->food_id)->decrement('quantity', $cart_item->food_quantity);
        $cart_item->forceDelete();
      }
      
      $order_details = OrderDetail::where('order_id' , 1)->get();
    //   Mail::to($request->email)->send(new PuarchaseConfirm($order_details));
      if($request->payment_option == 2){
        session(['order_id_from_checkout_page' => $order_id]);
        return redirect('stripe');
      }
      elseif($request->payment_option == 3){
        session(['order_id_from_checkout_page' => $order_id]);
        return redirect('/example2');
      }

      else {
        return redirect('/cart');
      }
      
    }

    // function testsms(){
    //   //POST Method example

    //   $url = "http://66.45.237.70/api.php";
    //   $number="01714895074,01840416216";
    //   $text="If you want to win a laptop, please contact this number 01840416216";
    //   $data= array(
    //   'username'=>"01840416216",
    //   'password'=>"CKT4SMZF",
    //   'number'=>"$number",
    //   'message'=>"$text"
    //   );

    //   $ch = curl_init(); // Initialize cURL
    //   curl_setopt($ch, CURLOPT_URL,$url);
    //   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //   $smsresult = curl_exec($ch);
    //   $p = explode("|",$smsresult);
    //   $sendstatus = $p[0];
    // }

}
