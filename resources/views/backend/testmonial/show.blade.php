@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Paravel | Testmonial View') }}
@endsection

@section('testmonial')
active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Testmonial View</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Testmonial View Page</h5>
         <p>This is a Testmonial View Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Testmonial View Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('testmonial.index') }}" type="button" class="btn btn-success">Add Testmonial</a>
                <a href = "{{ route('testmonial.trashall') }}" type="button" class="btn btn-danger">Trash Testmonial</a>
              </div>
              
           </div>
         </div>
           <div class="row">

              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Testmonial View</h2>
                          <hr>
                         <h4>Total Product : {{ $testmonial_total }}</h4>
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
                        

                             <table class="table table-dark text-center" id = "data_tables">
                               <thead>
                                 <tr>
                                   <th>SL No.</th>
                                   <th>Client Name</th>
                                   <th>Client Position</th>
                                   <th>Client Review Text</th>
                                   <th>Client Photo</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($testmonial_all as $testmonial)
                                 <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ Str::limit($testmonial->client_name , 10) }}</td>
                                   <td>{{ $testmonial->client_position }}</td>
                                   <td>{{ Str::limit($testmonial->client_review_text , 10) }}</td>
                                   <td>
                                     <img src="{{ asset('uploads/testmonial_photos') }}/{{ $testmonial->client_photo }}" alt="" width="100">
                                   </td>
                                   <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href = "{{ route('testmonial.edit' , $testmonial->id) }}" type="button" class="btn btn-primary">Edit</a>

                                       <a href = "{{ route('testmonial.trash' , $testmonial->id) }}" type="button" class="btn btn-warning">Trash</a>
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
