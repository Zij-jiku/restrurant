@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Restrurant | Category Add') }}
@endsection
@section('category')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Category</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Category Page</h5>
         <p>This is a Category Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Category Page</h1>
           </div>
         </div>
           <div class="row">
              <div class="col-md-8">
                   <div class="card">
                       <div class="card-header">
                          <h2>Category View</h2>
                          <hr>
                         {{-- <h4>Total Category : {{ $total_categorys }}</h4> --}}
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
                        
                             <table class="table table-dark" id = "data_tables_2">
                               <thead>
                                 <tr>
                                   <th>SL No.</th>
                                   <th>Category Name</th>
                                   <th>Category Photo</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($categorys as $category)
                                 <tr>
                                 
                                   <th>{{ $loop->index + 1 }}</th>
                                   <td>{{ Str::title($category->category_name) }}</td>
                                   <td>
                                     <img src="{{ asset('uploads/category_photos') }}/{{ $category->image }}" alt="" width="100">
                                   </td>
                                   <td>
                                     <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href = "{{ route('category.edit' , $category->id) }}" type="button" class="btn btn-primary">Edit</a>

                                      <form action="{{ route('category.destroy' , $category->id) }}" method="post">
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
                       <h2>Category Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('category.store') }}" enctype="multipart/form-data">
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
                          <label>Category Name</label>
                          <input type="text" class="form-control" placeholder="Category Name" name = "category_name" value = "{{ old('category_name') }}">
                          @error ('category_name')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                   

                        <div class="form-group">
                          <label>Category Photo</label>
                          <input type="file" class="form-control" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>
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
