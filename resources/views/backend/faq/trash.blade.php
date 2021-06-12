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
                <a href = "{{ route('faq.viewall') }}" type="button" class="btn btn-primary">All Faq</a>
              </div>

           </div>
         </div>
           <div class="row">
            
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Trash View</h2>
                          <hr>
                         {{-- <h4>Delete Faq : {{ $faq_delete_total }}</h4> --}}
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
                        
                           <table class="table table-dark" id = "data_tables_2">
                             <thead>
                               <tr>
                               
                                 <th>SL No.</th>
                                 <th>Faq Question</th>
                                 <th>Faq Answare</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               @forelse($faq_deleted as $total_delete)
                               <tr>
                                 
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ Str::limit($total_delete->faq_question , 20) }}</td>
                                 <td>{{ Str::limit($total_delete->faq_answare , 40) }}</td>
                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href="{{ route('faqrestore' , $total_delete->id) }}" class="btn btn-success">Restore</a>
                                     <a href="{{ route('faqdelete' , $total_delete->id) }}" class="btn btn-danger">Delete</a>
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
