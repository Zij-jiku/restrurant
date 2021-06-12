@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Restrurant  | Banner View') }}
@endsection

@section('banner')
active
@endsection

@section('dashboard_content')


  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Banner</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Banner View Page</h5>
         <p>This is a Banner View Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Banner View Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('banner.index') }}" type="button" class="btn btn-success">Add Banner</a>
              </div>


           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Banner View</h2>
                          <hr>
                         {{-- <h4>Total Product : {{ $banners_total }}</h4> --}}
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

                         @if(session()->has('success_status'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success_status') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif
                         
                             <table class="table table-dark text-center" id = "data_tables_3">
                               <thead>
                                 <tr>
                                   <th>ID No.</th>
                                   <th>Banner Title</th>
                                   <th>Heading</th>
                                   <th>Description</th>
                                   <th>Image</th>
                                   <th>BG Image </th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($banners_all as $banner)
                                 <tr>
                                   <td>{{ $banner->id }}</td>
                                   <td>{{ Str::limit($banner->title , 10) }}</td>
                                   <td>{{ Str::limit($banner->heading , 10) }}</td>
                                   <td>{{ Str::limit($banner->description , 10) }}</td>

                                   <td>
                                     <img src="{{ asset('uploads/banner_photos') }}/{{ $banner->image }}" alt="" width="100">
                                   </td>

                                   <td>
                                    <img src="{{ asset('uploads/banner_photos') }}/{{ $banner->bg_image }}" alt="" width="100">
                                  </td>
                                   <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href = "{{ route('banner.edit' , $banner->id) }}" type="button" class="btn btn-primary">Edit</a>

                                       
                                       <form action="{{ route('banner.destroy' , $banner->id) }}" method="post">
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
