<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Food;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.food.index' , [
            'categories_all' => Category::Latest()->get(),
            'tags_all' => Tag::Latest()->get(),
        ]);
    }

    public function foodview(){
        return view('backend.food.show' , [
            'food_all' => Food::Latest()->get(),
            'food_product' => Food::all()->count(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug_link = Str::slug($request->food_name.'-'.Str::random(6));
        $request->validate([
            'food_name' => 'required' , 'unique:foods,food_name',
            'category_id' => 'required',
            'tag_id' => 'required',
            'price' => 'required',
            'code' => 'required',
            'weight' => 'required',
            'dimensions' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'quantity' => 'required|numeric',
            'alert_quantity' => 'required|numeric',
            'image' => 'required',
            'big_image' => 'required',
        ]);
        $food_id = Food::insertGetId($request->except('_token' , 'image' , 'big_image') + [
          'created_at' => Carbon::now(),
          'slug' => $slug_link,
        ]);
        if($request->hasFile('image')){
          $uploded_photo = $request->file('image');
          $new_photo_name = $food_id.'-'.Str::random(3).".".$uploded_photo->extension();
          $new_photo_location = 'public/uploads/food_photos/'.$new_photo_name;
          Image::make($uploded_photo)->resize(227,226)->save(base_path($new_photo_location) , 80);
          Food::find($food_id)->update([
            'image' => $new_photo_name
          ]);
        }

        if($request->hasFile('big_image')){
            $uploded_photo = $request->file('big_image');
            $new_photo_name = $food_id.'-'.Str::random(4).".".$uploded_photo->extension();
            $new_photo_location = 'public/uploads/food_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(500,385)->save(base_path($new_photo_location) , 40);
            Food::find($food_id)->update([
              'big_image' => $new_photo_name
            ]);
        }

        return back()->with('success_status' , $request->food_name." Food Insert SuccessFully!!");
    }

 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
