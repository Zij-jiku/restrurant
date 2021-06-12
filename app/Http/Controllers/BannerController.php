<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.banner.index');
    }

    public function bannerviewall(){
        return view('backend.banner.show' , [
            'banners_all' => Banner::Latest()->get()
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
            'title' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required',
            'bg_image' => 'required',
          ]);
    
          $banner_id = Banner::insertGetId($request->except('_token','image','bg_image') + [
            'created_at' => Carbon::now(),
          ]);
          if($request->hasFile('image')){
            $uploded_photo = $request->file('image');
            $new_photo_name = $banner_id.'-'.Str::random(3).".".$uploded_photo->extension();
            $new_photo_location = 'public/uploads/banner_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(281,241)->save(base_path($new_photo_location) , 80);
            Banner::find($banner_id)->update([
              'image' => $new_photo_name
            ]);
          }

          if($request->hasFile('bg_image')){
            $uploded_photo = $request->file('bg_image');
            $new_photo_name = $banner_id.'-'.Str::random(4).".".$uploded_photo->extension();
            $new_photo_location = 'public/uploads/banner_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(1620,645)->save(base_path($new_photo_location) , 80);
            Banner::find($banner_id)->update([
              'bg_image' => $new_photo_name
            ]);
          }
          
          return redirect('banner/view')->with('success_status','Banner  SuccessFully!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit',[
            'banner_info' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {

        $banner->update($request->except('_token' , '_method' , 'image' , 'bg_image'));
        if($request->hasFile('image')){
          if($banner->image != null){
            // delete photo
            $old_location = 'public/uploads/banner_photos/'.$banner->image;
            unlink(base_path($old_location));

            $uploded_photo = $request->file('image');
            $new_photo_name = $banner->id.'-'.Str::random(3).".".$uploded_photo->extension();
            $new_photo_location = 'public/uploads/banner_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(281,41)->save(base_path($new_photo_location) , 70);
            Banner::find($banner->id)->update([
              'image' => $new_photo_name
            ]);
          }
        }

        if($request->hasFile('bg_image')){
            if($banner->bg_image != null){
              // delete photo
              $old_location = 'public/uploads/banner_photos/'.$banner->bg_image;
              unlink(base_path($old_location));
  
              $uploded_photo = $request->file('bg_image');
              $new_photo_name = $banner->id.'-'.Str::random(4).".".$uploded_photo->extension();
              $new_photo_location = 'public/uploads/banner_photos/'.$new_photo_name;
              Image::make($uploded_photo)->resize(1620,645)->save(base_path($new_photo_location) , 70);
              Banner::find($banner->id)->update([
                'bg_image' => $new_photo_name
              ]);
            }
        }

        return redirect('banner/view')->with('udpate_status' , 'Banner Update Successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('delete_status' , 'Banner Delete Successfully!');

    }
}
