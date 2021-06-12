@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Paravel | Testmonial Add') }}
@endsection

@section('testmonial')
active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Testmonial</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Testmonial Page</h5>
         <p>This is a Testmonial Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row justify-content-center">
           <div class="col-md-8">
              <h1 class = "text-center my-3">Testmonial Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('testmonial.viewall') }}" type="button" class="btn btn-primary">All Testmonial</a>
                <a href = "{{ route('testmonial.trashall') }}" type="button" class="btn btn-danger">Trash Testmonial</a>
              </div>

           </div>
         </div>
           <div class="row justify-content-center">
             
              <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h2>Testmonial Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('testmonial.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if(session()->has('success_status'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('success_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif

                        <div class="form-group">
                          <label>Client Name</label>
                          <input type="text" class="form-control" placeholder="Client Name" name = "client_name" value = "{{ old('client_name') }}">
                          @error ('client_name')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Client Position</label>
                          <input type="text" class="form-control" placeholder="Client Position" name = "client_position" value = "{{ old('client_position') }}">
                          @error ('client_position')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Client Review Text</label>
                          <textarea name="client_review_text" rows="2" class="form-control" placeholder="Client Review Text">{{ old('client_review_text') }}</textarea>
                          @error ('client_review_text')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Clint Photo</label>
                          <input type="file" class="form-control" name="client_photo">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Testmonial</button>
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
