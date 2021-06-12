@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Paravel | Food Add ') }}
@endsection

@section('food')
 active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Food</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Food Page</h5>
         <p>This is a Food Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Food Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('food.view') }}" type="button" class="btn btn-primary">All food</a>
              </div>

           </div>

         </div>
           <div class="row">

              <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h2>Food Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('food.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if(session()->has('success_status'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('success_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif

                        @if(session()->has('success_message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif


                        <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category_id">
                                  <option value="">--Select One--</option>
                                  @foreach ($categories_all as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                  @endforeach
                                </select>
                                @error ('category_id')
                                  <span class = "text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                          </div>

                          <div class="col-lg-6">
                              <div class="form-group">
                                <label>Tag Name</label>
                                <select class="form-control" name="tag_id">
                                  <option value="">--Select One--</option>
                                  @foreach ($tags_all as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                  @endforeach
                                </select>
                                @error ('tag_id')
                                  <span class = "text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                          </div>
                        </div>



                        <div class="form-group">
                          <label>Food Name</label>
                          <input type="text" class="form-control" placeholder="Food Name" name = "food_name" value = "{{ old('food_name') }}">
                          @error ('food_name')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Weight</label>
                          <input type="text" class="form-control" placeholder="Weight" name = "weight" value = "{{ old('weight') }}">
                          @error ('weight')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>


                        <div class="form-group">
                          <label>Dimensions</label>
                          <input type="text" class="form-control" placeholder="Dimensions" name = "dimensions" value = "{{ old('dimensions') }}">
                          @error ('dimensions')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Price</label>
                          <input type="number" class="form-control" placeholder="Food Price" name = "price" value = "{{ old('price') }}">
                          @error ('food_price')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Code</label>
                          <input type="text" class="form-control" placeholder="Food Code" name = "code" value = "{{ old('code') }}">
                          @error ('code')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Short Description</label>
                          <textarea type = "text" name="short_description" rows="2" class="form-control" placeholder="Short Description">{{ old('short_description') }}</textarea>
                          @error ('short_description')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Long Description</label>
                          <textarea type = "text" name="long_description" rows="4" class="form-control" placeholder="Long Description">{{ old('long_description') }}</textarea>
                          @error ('long_description')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="number" class="form-control" placeholder="Food Quantity" name = "quantity" value = "{{ old('quantity') }}">
                          @error ('quantity')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Alert Quantity</label>
                          <input type="number" class="form-control" placeholder="Alert Quantity" name = "alert_quantity" value = "{{ old('alert_quantity') }}">
                          @error ('alert_quantity')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Image</label>
                          <input type="file" class="form-control" name="image">
                          @error ('image')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Big Photo</label>
                          <input type="file" class="form-control" name="big_image">
                            @error ('big_image')
                             <span class = "text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                      
                        <button type="submit" class="btn btn-primary">Add food</button>
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
