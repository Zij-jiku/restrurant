@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Paravel | Coupon Add ') }}
@endsection

@section('coupon')
 active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Coupon</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Coupon Page</h5>
         <p>This is a Coupon Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Coupon Page</h1>
           </div>
         </div>
           <div class="row">
              <div class="col-md-8">
                   <div class="card">
                       <div class="card-header">
                          <h2>Coupon View</h2>
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
                                   <th>SL No.</th>
                                   <th>Coupon Name</th>
                                   <th>Create By</th>
                                   <th>Discount Percent</th>
                                   <th>Min Parchase Amount</th>
                                   <th>Validity Till</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($coupons_info as $coupons)
                                 <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ Str::limit($coupons->coupon_name , 10) }}</td>
                                   <td>{{ $coupons->relation_with_user_table->name }}</td>
                                   <td>{{ $coupons->discount_percent }}</td>
                                   <td>{{ $coupons->min_purchase_amount }}</td>
                                   <td>{{ $coupons->validity_till }}</td>

                                   <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href = "{{ route('coupon.edit' , $coupons->id) }}" type="button" class="btn btn-primary">Edit</a>

                                       <form action="{{ route('coupon.destroy' , $coupons->id) }}" method="post">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="btn btn-danger">Delete</button>
                                       </form>
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

              <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                       <h2>Coupon Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('coupon.store') }}">
                        @csrf

                        @if(session()->has('coupon_status'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('coupon_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif

                        <div class="form-group">
                          <label>Coupon Name</label>
                          <input type="text" class="form-control" placeholder="Coupon Name" name = "coupon_name" value = "{{ old('coupon_name') }}">
                          @error ('coupon_name')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Coupon Percent</label>
                          <input type="number" class="form-control" placeholder="Coupon Percent" name = "discount_percent" value = "{{ old('discount_percent') }}">
                          @error ('discount_percent')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Min Purchase Amount</label>
                          <input type="number" class="form-control" placeholder="Min Purchase Amount" name = "min_purchase_amount" value = "{{ old('min_purchase_amount') }}">
                          @error ('min_purchase_amount')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Valid Till</label>
                          <input type="date" class="form-control" name = "validity_till">
                          @error ('validity_till')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Coupon</button>
                      </form>

                    </div>
               </div>
              </div>

              <div class="col-md-8">
                   <div class="card">
                       <div class="card-header">
                          <h2>Trash View</h2>
                          <hr>
                         {{-- <h4>Delete Category : {{ $product_deleted_total }}</h4> --}}
                       </div>
                       <div class="card-body">
                         @if(session()->has('restore_status'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session()->get('restore_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif
                         @if(session()->has('delete_status'))
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              {{ session()->get('delete_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif
                         @if(session()->has('mark_restore'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('mark_restore') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif
                         @if(session()->has('force_delete'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('force_delete') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif

                         <form action="{{ route('markrestoredelete') }}" method="post">
                           @csrf
                           <table class="table table-dark" id = "data_tables_2">
                             <thead>
                               <tr>
                                 <th>Mark</th>
                                 <th>SL No.</th>
                                 <th>Coupon Name</th>
                                 <th>Coupon Name</th>
                                 <th>Coupon Price</th>
                                 <th>Coupon Short Description</th>
                                 <th>Coupon Photo</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               {{-- @forelse($product_deleted as $product_delete)
                               <tr>
                                 <td>
                                   <input type="checkbox" name="product_id[]" value="{{ $product_delete->id }}">
                                 </td>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ Str::limit($product_delete->product_name , 10) }}</td>
                                 <td>
                                   @if (isset($product->relation_with_category_table->id))
                                     {{ $product->relation_with_category_table->category_name }}
                                   @else
                                     {{ "Category Nai" }}
                                   @endif
                                 </td>
                                 <td>{{ $product_delete->product_price }}</td>
                                 <td>{{ Str::limit($product_delete->product_short_description , 10) }}</td>
                                 <td>
                                   <img src="{{ asset('uploads/product_photos') }}/{{ $product_delete->product_photo }}" alt="" width="100">
                                 </td>
                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href="{{ route('productrestore' , $product_delete->id) }}" class="btn btn-success">Restore</a>
                                     <a href="{{ route('productdelete' , $product_delete->id) }}" class="btn btn-danger">Delete</a>
                                   </div>
                                 </td>
                               </tr>
                               @empty
                                 <tr>
                                   <td class = "text-danger text-center" colspan="50">No Data Available</td>
                                 </tr>
                             @endforelse --}}
                             </tbody>
                           </table>
                           {{-- @if ($product_deleted->count() > 1)
                             <button type="submit" class="btn btn-success" name = "button" value = "Restore">Mark All Restore</button>
                             <button type="submit" class="btn btn-danger" name = "button" value = "Delete">Mark All Delete</button>
                           @endif --}}
                         </form>
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
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>

<script>
// $(document).ready(function() {
//     $('#data_tables').DataTable();
// } );
$(document).ready(function() {
    $('#data_tables_2').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>
@endsection
