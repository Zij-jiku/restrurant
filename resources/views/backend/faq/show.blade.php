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
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Faq Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('faq.index') }}" type="button" class="btn btn-success">Add Faq</a>
                <a href = "{{ route('faq.trashall') }}" type="button" class="btn btn-danger">Trash Faq</a>
              </div>


           </div>
         </div>

           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Faq View</h2>
                          <hr>
                         {{-- <h4>Total Faq : {{ $total_faq }}</h4> --}}
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
                                   <th>Faq Question</th>
                                   <th>Faq Answare</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($faq_all as $faq)
                                 <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ Str::limit($faq->faq_question , 10) }}</td>
                                   <td>{{ Str::limit($faq->faq_answare , 10) }}</td>
                                   <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href = "{{ route('faq.edit' , $faq->id) }}" type="button" class="btn btn-primary">Edit</a>

                                       <form action="{{ route('faq.destroy' , $faq->id) }}" method="post">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="btn btn-warning">Trash</button>
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
