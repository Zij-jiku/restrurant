<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\TableBook;
use Illuminate\Http\Request;

class TableBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tablebook.index' , [
            'tablebooks_all'  => TableBook::all(),
            'total_tablebooks'  => TableBook::count(),
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
            'people' => 'required|numeric|max:1000',
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        TableBook::insert($request->except('_token')+[
          'created_at'=>Carbon::now()
        ]);
        return back()->with('success_status', 'Restrurant Table Booking  Successfully!!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableBook  $tableBook
     * @return \Illuminate\Http\Response
     */
    public function edit(TableBook $tableBook)
    {
        return view('backend.tablebook.edit' , [
            'tablebooks_info' => $tableBook
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableBook  $tableBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableBook $tableBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableBook  $tableBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableBook $tableBook)
    {
        //
    }
}
