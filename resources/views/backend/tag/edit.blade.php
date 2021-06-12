@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Restrurant | Tag Edit') }}
@endsection
@section('tag')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <a class="breadcrumb-item" href="{{ route('tag.index') }}">Tag</a>
       <span class="breadcrumb-item active"> {{ $tag_info->tag_name }} </span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Tag Edit Page</h5>
         <p>This is a Tag Edit Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6 m-auto">
             <div class="card">
                 <div class="card-body">
                   <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tag </a></li>
                       <li class="breadcrumb-item active" aria-current="page"> {{ $tag_info->tag_name }} </li>
                     </ol>
                   </nav>

                   <form method="post" action = "{{ route('tag.update' , $tag_info->id) }}">
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
                       <label>Tag Name</label>
                       <input type="hidden" name="tag_id" value="{{ $tag_info->id }}">
                       <input type="text" class="form-control" name = "tag_name" value = "{{ $tag_info->tag_name }}">
                     
                     </div>

                     <button type="submit" class="btn btn-primary edit_button">Update Tag</button>
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
