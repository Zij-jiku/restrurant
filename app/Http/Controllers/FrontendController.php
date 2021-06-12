<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Food;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Chep;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Frontend Page
    public function index(){
        $food_info = DB::table('food')
        ->join('categories','food.category_id','categories.id')
        ->join('tags','food.tag_id','tags.id')
        ->select('food.*','categories.category_name','tags.tag_name')
        ->get();
        return view('welcome' , [
            'category_all' => Category::all(),
            'about_all' => About::all(),
            'food_all' => Food::all(),
            'banner_all' => Banner::all(),
            'categories_info' => Category::all(),
            'food_info' => $food_info,
            'chep_info' => Chep::all(),
            
        ]);
    }

    public function fooddetails($slug){
   
      $food_info = Food::where('slug' , $slug)->firstOrFail();
      $related_products = Food::where('category_id' , $food_info->category_id)->where('id','!=',$food_info->id)->get();

      $food_info = DB::table('food')->where('slug', $slug)
            ->join('categories','food.category_id','categories.id')
            ->join('tags','food.tag_id','tags.id')
            ->select('food.*','categories.category_name','tags.tag_name')
            ->first();

      return view('frontend.fooddetails' , [
        'food_info' => $food_info,
        'related_products' => $related_products,
      ]);

    }

    // Menu Page
    public function menu(){
      $food_info = DB::table('food')
      ->join('categories','food.category_id','categories.id')
      ->join('tags','food.tag_id','tags.id')
      ->select('food.*','categories.category_name','tags.tag_name')
      ->get();
        return view('frontend.menu' , [
          'food_info' => $food_info,
        ]);
    }

    // Shop Page
    public function shop()
    {

      $food_info = DB::table('food')
      ->join('categories','food.category_id','categories.id')
      ->join('tags','food.tag_id','tags.id')
      ->select('food.*','categories.category_name','tags.tag_name')
      ->get();


      return view('frontend.shop' , [
        'food_info' => $food_info,
      ]);
    }

    // About Page
    public function about(){
        return view('frontend.about');
    }

    // Blog Page
    public function blog()
    {
        return view('frontend.blog',[
            'blog_all' => Blog::all(),
        ]);
    }

    // Contact Page
    function contact(){
        return view('frontend.contact');
    }

    // Reservation Page
    function reservation(){
        return view('frontend.reservation');
    }

    

      // Customer Email Subscribe
      function customeremail(Request $request){
        $request->validate([
          'email' => 'required|email|unique:customer_emails,email'
        ]);
  
        CustomerEmail::insert($request->except('_token')+[
          'created_at' => Carbon::now(),
        ]);
        return back()->with('success_email' , 'Subscribe Successfully!!');
      }

    
       
       public function blogdetails($slug)
       {
         return view('frontend.blogdetails' , [
            'blog_details_info' => Blog::where('slug' , $slug)->firstOrFail(),
            'blog_all' => Blog::latest()->limit(4)->get(),
         ]);
       }
 
     
 
       function contactpost(Request $request){
         $request->validate([
           'customer_name' => 'required',
           'customer_email' => 'required|email',
           'customer_subject' => 'required',
           'customer_message' => 'required',
         ]);
         $customer_id = Customerinfo::insertGetId($request->except('_token')+[
           'created_at' => Carbon::now(),
         ]);
         if($request->hasFile('customer_file')){
           // $path = $request->file('customer_file')->store('customer_uploads');
           $path = $request->file('customer_file')->storeAs(
             'customer_uploads', $customer_id.".".$request->file('customer_file')->extension(),
           );
           Customerinfo::find($customer_id)->update([
             'customer_file' => $path,
           ]);
         }
         return back()->with('success_status' , 'We Recived SuccessFully!!!');
       }





        // Customer Login
      function loginregistration()
      {
        return view('frontend.loginregistration');
      }
      
      function customerregistration(Request $request)
      {
        $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::insert([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'role' => 2,
          'created_at' => Carbon::now(),
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          return redirect('customer/home');
        }
        return back()->with('success_status' , $request->name.' Your Account Create Successfully !!!');
      }

      function customerloginpage()
      {
        return view('frontend.customerloginpage');
      }




}
