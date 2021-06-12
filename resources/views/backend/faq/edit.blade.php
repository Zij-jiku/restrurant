@extends('layouts.dashboard_app')

@section('page_title')

@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('/home') }}">Home</a>
       <span class="breadcrumb-item active">Faq Edit Page</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Faq Edit Page</h5>
         <p>This is a Faq Edit Dynamic Place</p>
       </div><!-- sl-page-title -->

       <div class="row">
         <div class="col-md-8 m-auto">
           <div class="card">
               <div class="card-header">
                  <h2>Faq Edit</h2>
               </div>
               <div class="card-body">

                 <form method="post" action = "{{ route('faq.update' , $faq_info->id) }}">
                   @csrf
                   @method('PATCH')

                   @if(session()->has('edit_status'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('edit_status') }}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                   @endif

                   <div class="form-group">
                     <label>Faq Question</label>
                     <input type="text" class="form-control" placeholder="Faq Question" name = "faq_question" value = "{{ $faq_info->faq_question }}">
                     @error ('faq_question')
                       <span class = "text-danger">{{ $message }}</span>
                     @enderror
                   </div>

                   <div class="form-group">
                     <label>Faq Answer</label>
                     <textarea name="faq_answare" rows="2" class="form-control" placeholder="Faq Answer">{{ $faq_info->faq_answare }}</textarea>
                     @error ('faq_answare')
                       <span class = "text-danger">{{ $message }}</span>
                     @enderror
                   </div>
                   <button type="submit" class="btn btn-primary">Edit Faq</button>
                 </form>

               </div>
          </div>
         </div>
       </div>

     </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

@endsection
