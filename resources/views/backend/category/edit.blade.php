@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Restrurant | Category Edit') }}
@endsection
@section('category')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <a class="breadcrumb-item" href="{{ route('category.index') }}">Category</a>
       <span class="breadcrumb-item active"> {{ $category_info->category_name }} </span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Category Edit Page</h5>
         <p>This is a Category Edit Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6 m-auto">
             <div class="card">
                 <div class="card-body">
                   <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="#">Edit Category </a></li>
                       <li class="breadcrumb-item active" aria-current="page"> {{ $category_info->category_name }} </li>
                     </ol>
                   </nav>

                   <form method="post" action = "{{ route('category.update' , $category_info->id) }}" enctype="multipart/form-data">
                     @csrf
                     @method('PATCH')

                     @if(session()->has('update_status'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session()->get('update_status') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     @endif

                     <div class="form-group">
                       <label>Category Name</label>
                       <input type="hidden" name="category_id" value="{{ $category_info->id }}">
                       <input type="text" class="form-control" placeholder="Category Name" name = "category_name" value = "{{ $category_info->category_name }}">
                       @error ('category_name')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>Category Description</label>
                       <textarea name="category_description" rows="4" class="form-control" placeholder="Category Description">{{ $category_info->category_description }}</textarea>
                     </div>

                     <div class="form-group">
                       <label>Category Photo</label>
                       <input type="file" class="form-control" name = "category_photo">
                       <img src="{{ asset('uploads/category_photos') }}/{{ $category_info->category_photo }}" alt="" width="100" class = "mt-3">
                     </div>

                     <button type="submit" class="btn btn-primary edit_button">Update Category</button>
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
