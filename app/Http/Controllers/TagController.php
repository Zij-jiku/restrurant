<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tag.index' , [
            'tags_all' => Tag::all()
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
            'tag_name' => 'unique:tags,tag_name',
        ]);
        Tag::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success_status' , $request->tag_name.' Tag Insert Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('backend.tag.edit' , [
            'tag_info' => $tag
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        Tag::find($request->tag_id)->update([
            'tag_name' => $request->tag_name,
        ]);
        return back()->with('update_status' , 'Tag Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('trash_status' , ' Tag Delete Successfully!');
    }
}
