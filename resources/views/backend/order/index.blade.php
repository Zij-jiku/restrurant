@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Paravel | Product Add ') }}
@endsection

@section('product')
 active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Order</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Order Page</h5>
         <p>This is a Product Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Order Page</h1>
           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Order View</h2>
                          <hr>
                         {{-- <h4>Total Product : {{ $product_total }}</h4> --}}
                       </div>
                       <div class="card-body">
                         @if(session()->has('trash_status'))
                           <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                              {{ session()->get('trash_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif
                         {{-- @if(session()->has('mark_delete_success'))
                           <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                              {{ session()->get('mark_delete_success') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif --}}

                             <table class="table table-dark" id = "data_tables">
                               <thead>
                                 <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Payment Option</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Coupon Name</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($orders as $order)
                                 <tr>
                                   <td>{{ $order->id}}</td>
                                   <td>
                                     ---
                                   </td>
                                    <td>
                                    @if ($order->payment_option == 1)
                                    Cash On Delivery 
                                   @else
                                    Creadit Cart 
                                    @endif
                                    </td>

                                    <td>
                                    @if ($order->payment_status == 2)
                                    <span class = "badge badge-success">Paid</span>
                                    @elseif($order->payment_status == 3)
                                    
                                    <span class = "badge badge-warning">Cancel</span>
                                    @else
                                        
                                    <span class = "badge badge-danger">Unpaid</span>
                                   @endif
                                    </td>
                                    <td>  {{ $order->coupon_name}}</td>
                                    <td>$ {{ $order->total}}</td>
                                    <td>
                                    <a href="{{ url('download/invoice') }}/{{ $order->id }}"><i class = "fa fa-download fa-2x mr-2"></i>Invoice</a>
                                    </td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            @if ($order->payment_status != 2)
                                            <form action="{{ route('order.update' , $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class = "btn btn-sm btn-success"> Paid </button>
                                            </form>  
                                            @endif

                                            @if ($order->payment_status == 1)
                                             <a href="{{ route('order.cancel',$order->id) }}" class = "btn btn-sm btn-danger"> Cancel </a>
                                            @endif
                                          </div>   
                                    </td>
                                 </tr>
                                 @empty
                                   <tr>
                                     <td class = "text-danger text-center" colspan="50">No Data Available</td>
                                   </tr>
                               @endforelse

                               </tbody>
                             </table>

                       </div>
                   </div>
              </div>

            

           </div>
       </div>

     </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

@endsection

@section('footer_scripts')

<script>
// $(document).ready(function() {
//     $('#data_tables').DataTable();
// } );
$(document).ready(function() {
    $('#data_tables').DataTable( {
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>

@endsection
