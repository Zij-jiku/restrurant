@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Restrurant | Banner Edit') }}
@endsection
@section('banner')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <a class="breadcrumb-item" href="{{ route('banner.index') }}">Banner</a>
       <a class="breadcrumb-item" href="#">{{ $banner_info->title }}</a>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Banner Edit Page</h5>
         <p>This is a Banner Edit Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6 m-auto">
             <div class="card">
                 <div class="card-header">
                    <h2>Edit Banner</h2>
                 </div>
                 <div class="card-body">

                   <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Banner</a></li>
                       <li class="breadcrumb-item active" aria-current="page"> {{ $banner_info->title }} </li>
                     </ol>
                   </nav>

              

                   <form method="post" action = "{{ route('banner.update' , $banner_info->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')


                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" placeholder="Banner Title" name = "title" value = "{{ $banner_info->title }}">
                      @error ('title')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Heading</label>
                      <input type="text" class="form-control" placeholder="Heading" name = "heading" value = "{{ $banner_info->heading }}">
                      @error ('heading')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>


                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" rows="4" class="form-control" placeholder="Description">{{ $banner_info->description }}</textarea>
                      @error ('description')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Photo</label>
                      <input type="file" class="form-control" name="image">
                      <img src="{{ asset('uploads/banner_photos') }}/{{ $banner_info->image }}" alt="" width="100" class="mt-3">
                      </div>
                      
                      <div class="form-group">
                        <label>BG Photo</label>
                        <input type="file" class="form-control" name="bg_image">
                        <img src="{{ asset('uploads/banner_photos') }}/{{ $banner_info->bg_image }}" alt="" width="100" class="mt-3">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Banner</button>
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
