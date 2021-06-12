<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Chep;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ChepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.chep.index');
    }

    public function chepview(){
        return view('backend.chep.show' , [
            'cheps_all' => chep::Latest()->get()
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
            'chep_name' => 'required',
            'position' => 'required',
            's_one' => 'required',
            's_two' => 'required',
            's_three' => 'required',
            's_four' => 'required',
            'image' => 'required',
        ]);
    
        $chep_id = chep::insertGetId($request->except('_token' , 'image') + [
          'created_at' => Carbon::now(),
        ]);

        if($request->hasFile('image')){
            $uploded_photo = $request->file('image');
            $new_photo_name = $chep_id.'-'.Str::random(3).".".$uploded_photo->extension();
            $new_photo_location = 'public/uploads/chep_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(570,739)->save(base_path($new_photo_location) , 60);
            chep::find($chep_id)->update([
                'image' => $new_photo_name
        ]);

        if($request->hasFile('big_image')){
            $uploded_photo = $request->file('big_image');
            $new_photo_name = $chep_id.'-'.Str::random(4).".".$uploded_photo->extension();

            $new_photo_location = 'public/uploads/chep_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(489,499)->save(base_path($new_photo_location) , 90);
            chep::find($chep_id)->update([
                'big_image' => $new_photo_name
            ]);
        }



        }
        return redirect('/chep/view')->with('success_status','Chep Insert SuccessFully!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chep  $chep
     * @return \Illuminate\Http\Response
     */
    public function edit(Chep $chep)
    {
        return view('backend.chep.edit',[
            'chep_info' => $chep
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chep  $chep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chep $chep)
    {

        $chep->update($request->except('_token' , '_method' , 'image'));

        if($request->hasFile('image')){
          if($chep->image != null){
            // delete photo
            $old_location = 'public/uploads/chep_photos/'.$chep->image;
            unlink(base_path($old_location));

            $uploded_photo = $request->file('image');
            $new_photo_name = $chep->id.'-'.Str::random(3).".".$uploded_photo->extension();
            $new_photo_location = 'public/uploads/chep_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(570,739)->save(base_path($new_photo_location) , 80);
            Chep::find($chep->id)->update([
              'image' => $new_photo_name
            ]);
          }
        }

        return redirect('/chep/view')->with('success_status','Chep Update SuccessFully!!');


 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chep  $chep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chep $chep)
    {
        $chep->delete();
        return back()->with('delete_status','Chep Delete SuccessFully!!');
    }
}
