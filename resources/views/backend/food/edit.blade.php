@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Paravel | Product Edit') }}
@endsection
@section('product')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <a class="breadcrumb-item" href="{{ route('product.index') }}">Product</a>
       <a class="breadcrumb-item" href="#">{{ $product_info->product_name }}</a>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Product Edit Page</h5>
         <p>This is a Product Edit Page</p>
       </div><!-- sl-page-title -->



       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6 m-auto">
             <div class="card">
                 <div class="card-header">
                    <h2>Edit Product</h2>
                 </div>
                 <div class="card-body">

                   <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product </a></li>
                       <li class="breadcrumb-item active" aria-current="page"> {{ $product_info->product_name }} </li>
                     </ol>
                   </nav>

                   <form method="post" action = "{{ route('product.update' , $product_info->id) }}" enctype="multipart/form-data">
                     @csrf
                     @method('PATCH')

                     @if(session()->has('success_sms'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session()->get('success_sms') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     @endif

                     <div class="form-group">
                       <label>Product Name</label>
                       <input type="text" class="form-control" placeholder="Product Name" name = "product_name" value = "{{ $product_info->product_name }}">
                       @error ('product_name')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>Category Name</label>
                       <select class="form-control" name="category_id">
                         <option value="">--Select One--</option>
                         @foreach ($category_info as $category)
                           <option {{ ($category->id == $product_info->category_id) ? "selected":"" }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                         @endforeach
                       </select>
                     </div>

                     <div class="form-group">
                       <label>Product Price</label>
                       <input type="number" class="form-control" placeholder="Product Price" name = "product_price" value = "{{ $product_info->product_price }}">
                       @error ('product_price')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>Product Short Description</label>
                       <textarea name="product_short_description" rows="2" class="form-control" placeholder="Product Short Description">{{ $product_info->product_short_description }}</textarea>
                       @error ('product_short_description')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>Product Long Description</label>
                       <textarea name="product_long_description" rows="4" class="form-control" placeholder="Product Long Description">{{ $product_info->product_long_description }}</textarea>
                       @error ('product_long_description')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>Product Quantity</label>
                       <input type="number" class="form-control" placeholder="Product Quantity" name = "product_quantity" value = "{{ $product_info->product_quantity }}">
                       @error ('product_quantity')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>Alert Quantity</label>
                       <input type="number" class="form-control" placeholder="Alert Quantity" name = "alert_quantity" value = "{{ $product_info->alert_quantity }}">
                       @error ('alert_quantity')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>Product Photo</label>
                       <input type="file" class="form-control" name = "product_photo">
                       <img src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt="" width="150" class = "mt-3">
                     </div>

                     <button type="submit" class="btn btn-primary">Edit Product</button>
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
