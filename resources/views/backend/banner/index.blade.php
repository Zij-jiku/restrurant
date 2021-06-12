@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Restrurant | Banner Add') }}
@endsection

@section('banner')
active
@endsection

@section('dashboard_content')


  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Banner Insert</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Banner Add Page</h5>
         <p>This is a Banner Add Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row justify-content-center">
           <div class="col-md-8">
              <h1 class = "text-center my-3">Banner Add Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('banner.viewall') }}" type="button" class="btn btn-primary">All Banner</a>
              </div>

           </div>
         </div>
           <div class="row justify-content-center">
             
              <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h2>Banner Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('banner.store') }}" enctype="multipart/form-data">
                        @csrf

                      

                        <div class="form-group">
                          <label>Title</label>
                          <input type="text" class="form-control" placeholder="Banner Title" name = "title" value = "{{ old('title') }}">
                          @error ('title')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Heading</label>
                          <input type="text" class="form-control" placeholder="Heading" name = "heading" value = "{{ old('heading') }}">
                          @error ('heading')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>


                        <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" rows="4" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                          @error ('description')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Photo</label>
                          <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                          <label>BG Photo</label>
                          <input type="file" class="form-control" name="bg_image">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Banner</button>
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

