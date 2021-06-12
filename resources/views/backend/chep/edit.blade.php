@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Dashboard | Chep Edit') }}
@endsection
@section('chep')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <span class="breadcrumb-item active">Edit Chep</span>
      </nav>
    </div><!-- br-pageheader -->
    
    <div class="br-pagebody">
      <!-- start you own content here -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                    <h2>Edit chep</h2>
                 </div>
                 <div class="card-body">

                   <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{ route('chep.index') }}">Chep : {{ $chep_info->chep_name }}</a></li>
                     </ol>
                   </nav>


                   <form method="post" action = "{{ route('chep.update' , $chep_info->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')


                    @if(session()->has('success_status'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{ session()->get('success_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>chep Name</label>
                          <input type="text" class="form-control" placeholder="chep Name" name = "chep_name" value = "{{ $chep_info->chep_name }}">
                        
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Position</label>
                          <input type="text" class="form-control" placeholder="Position" name = "position" value = "{{ $chep_info->position }}">
                       
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label> LinkedIn Link (Optional)</label>
                          <input type="text" class="form-control" placeholder="LinkedIn Link" name = "s_one" value = "{{ $chep_info->s_one }}">
                        
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Facebook Link (Optional)</label>
                          <input type="text" class="form-control" placeholder="Facebook Link" name = "s_two" value = "{{ $chep_info->s_two }}">
                         
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Portfolio Link (Optional)</label>
                          <input type="text" class="form-control" placeholder="Portfolio Link" name = "s_three" value = "{{ $chep_info->s_three }}">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Web Link (Optional)</label>
                          <input type="text" class="form-control" placeholder="Web Link" name = "s_four" value = "{{ $chep_info->s_four }}">
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label>Chep Photo</label>
                      <input type="file" class="form-control" name="image">
                       <img src="{{ asset('uploads/chep_photos') }}/{{ $chep_info->image }}" alt="" width="100" class="m-2">
                    </div>

                    <button type="submit" class="btn btn-primary">Update chep</button>
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
