@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Dashboard | TableBook View') }}
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
        <span class="breadcrumb-item active">View TableBook</span>
      </nav>
    </div><!-- br-pageheader -->
    
    <div class="br-pagebody">
      <!-- start you own content here -->


       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">TableBook View Page</h1>
           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>TableBook View</h2>
                          <hr>
                          <h4>Total Table Book: {{ $total_tablebooks }}</h4>
                       </div>
                       <div class="card-body">

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
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>People</th>
                                   <th>Date</th>
                                   <th>Time</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($tablebooks_all as $tablebook)
                                 <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ Str::limit($tablebook->name , 15) }}</td>
                                   <td>{{ $tablebook->email }}</td>
                                   <td>{{ $tablebook->phone }}</td>
                                   <td>{{ $tablebook->people }}</td>
                                   <td>{{ $tablebook->date }}</td>
                                   <td>{{ $tablebook->time }}</td>

                                   <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href = "{{ route('tablebook.edit' , $tablebook->id) }}" type="button" class="btn btn-primary">Edit</a>
                                      <form action="{{ route('tablebook.destroy',$tablebook->id) }}" method="POST">
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
$(document).ready(function() {
    $('#data_tables_3').DataTable( {
        "scrollY":        "600px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>
@endsection
