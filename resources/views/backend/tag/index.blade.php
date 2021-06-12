@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Restrurant | Tag Add') }}
@endsection
@section('tag')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Tag</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Tag Page</h5>
         <p>This is a Tag Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Tag Page</h1>
           </div>
         </div>
           <div class="row">
              <div class="col-md-8">
                   <div class="card">
                       <div class="card-header">
                          <h2>Tag View</h2>
                          <hr>
                         {{-- <h4>Total tag : {{ $total_tags }}</h4> --}}
                       </div>
                       <div class="card-body">

                         @if(session()->has('trash_status'))
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              {{ session()->get('trash_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif
                        
                             <table class="table table-dark" id = "data_tables_2">
                               <thead>
                                 <tr>
                                   <th>SL No.</th>
                                   <th>Tag Name</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($tags_all as $tag)
                                 <tr>
                                 
                                   <th>{{ $loop->index + 1 }}</th>
                                   <td>{{ Str::title($tag->tag_name) }}</td>
                                  
                                   <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href = "{{ route('tag.edit' , $tag->id) }}" type="button" class="btn btn-primary">Edit</a>

                                      <form action="{{ route('tag.destroy' , $tag->id) }}" method="post">
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
                       <h2>Tag Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('tag.store') }}">
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
                          <label>Tag Name</label>
                          <input type="text" class="form-control" placeholder="Tag Name" name = "tag_name" value = "{{ old('tag_name') }}">
                          @error ('tag_name')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add tag</button>
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
    $('#data_tables_2').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>
@endsection
