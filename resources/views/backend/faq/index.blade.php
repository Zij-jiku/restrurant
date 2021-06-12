@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Paravel | Faq Add ') }}
@endsection
@section('faq')
active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Faq</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Faq Page</h5>
         <p>This is a Faq Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row justify-content-center">
           <div class="col-md-8">
              <h1 class = "text-center my-3">Faq Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('faq.viewall') }}" type="button" class="btn btn-primary">All Faq</a>
                <a href = "{{ route('faq.trashall') }}" type="button" class="btn btn-danger">Trash Faq</a>
              </div>

           </div>
         </div>
           <div class="row justify-content-center">
              
              <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h2>Faq Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('faq.store') }}">
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
                          <label>Faq Question</label>
                          <input type="text" class="form-control" placeholder="Faq Question" name = "faq_question" value = "{{ old('faq_question') }}">
                          @error ('faq_question')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Faq Answer</label>
                          <textarea name="faq_answare" rows="4" class="form-control" placeholder="Faq Answer">{{ old('faq_answare') }}</textarea>
                          @error ('faq_answare')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Faq</button>
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
