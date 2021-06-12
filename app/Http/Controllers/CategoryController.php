<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.index',[
            'categorys' => Category::Latest()->get(),
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
        $request->validate([
            'category_name' => 'unique:categories,category_name',
        ]);

        $category_id = Category::insertGetId($request->except('_token','image') + [
            'created_at' => Carbon::now(),
        ]);

        if($request->hasFile('image')){
            $uploded_photo = $request->file('image');
            $new_photo_name = $category_id.'-'.Str::random(3).".".$uploded_photo->extension();
            $new_photo_location = 'public/uploads/category_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(570,388)->save(base_path($new_photo_location) , 80);
            Category::find($category_id)->update([
                'image' => $new_photo_name
            ]);
        }
        return back()->with('success_status' , $request->category_name.' Category Insert Successfully!');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit' , [
            'category_info' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
