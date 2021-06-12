<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.order.index' , [
            'orders' => Order::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->payment_status = 2;
        $order->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    function ordercancel($order_id)
    {

      $order_details = OrderDetail::where('order_id',$order_id)->get();
      foreach ($order_details as $order_detail) {
          Food::find($order_detail->food_id)->increment('quantity' , $order_detail->food_quantity);
      }
      Order::find($order_id)->update([
          'payment_status' => 3
      ]);
      return back();
    }

    public function downloadinvoice($order_id){
        // return $order_id;
        $order_info = Order::find($order_id);
        $pdf = PDF::loadView('pdf.invoice' , compact('order_info'));
        return $pdf->download('paravel (ID'.$order_id.').pdf');
  
      }

}
