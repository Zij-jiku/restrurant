@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Dashboard | Chep View') }}
@endsection

@section('chep')
active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <span class="breadcrumb-item active">Add Chep</span>
      </nav>
    </div><!-- br-pageheader -->
    
    <div class="br-pagebody">
      <!-- start you own content here -->


       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Cheps View Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('chep.index') }}" type="button" class="btn btn-success">Add Chep</a>
              </div>


           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Chep View</h2>
                          <hr>
                       </div>
                       <div class="card-body">

                         @if(session()->has('success_status'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session()->get('success_status') }}
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

                         @if(session()->has('udpate_status'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session()->get('udpate_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif


                         

                             <table class="table text-center" id = "data_tables_3">
                               <thead>
                                 <tr>
                                   <th>SL No.</th>
                                   <th>Chep Name</th>
                                   <th>Position</th>
                                   <th>S_One</th>
                                   <th>S_Two</th>
                                   <th>S_Three</th>
                                   <th>S_Four</th>
                                   <th>Photo</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($cheps_all as $chep)
                                 <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ Str::limit($chep->chep_name , 15) }}</td>
                                   <td>{{ $chep->position }}</td>

                                   <td>{{ $chep->s_one }}</td>
                                   <td>{{ $chep->s_two }}</td>
                                   <td>{{ $chep->s_three }}</td>
                                   <td>{{ $chep->s_four }}</td>
                                   <td>
                                     <img src="{{ asset('uploads/chep_photos') }}/{{ $chep->image }}" alt="" width="100">
                                   </td>
                            
                                   <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href = "{{ route('chep.edit' , $chep->id) }}" type="button" class="btn btn-primary">Edit</a>
                                      <form action="{{ route('chep.destroy',$chep->id) }}" method="POST">
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
    $('#data_tables_3').DataTable( {
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
    $('#data_tables_4').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>

@endsection
