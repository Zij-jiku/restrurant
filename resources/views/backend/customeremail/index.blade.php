@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Paravel | CustomerEmail view ') }}
@endsection

@section('subscribe')
 active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">CustomerEmail View</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>CustomerEmail View Page</h5>
         <p>This is a CustomerEmail View Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">CustomerEmail View Page</h1>
           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>CustomerEmail View</h2>
                          <hr>
                         <h4>Total CustomerEmail : {{ $customeremail_total }}</h4>
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
                                   <th>Customer Email</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($customeremail_info as $customeremail)
                                 <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ Str::limit($customeremail->email , 30) }}</td>
                                   <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">
                                       {{-- <a href = "{{ route('customerEmail.edit' , $customeremail->id) }}" type="button" class="btn btn-primary">Edit</a> --}}
                                       <form action="{{ route('customerEmail.destroy' , $customeremail->id) }}" method="post">
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

              <div class="col-md-12">
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

                           <table class="table table-dark" id = "data_tables_2">
                             <thead>
                               <tr>
                                 <th>SL No.</th>
                                 <th>Customer Email</th>
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
