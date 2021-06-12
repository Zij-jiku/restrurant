@extends('layouts.dashboard_app')

@section('page_title')
{{ ('Dashboard | Chep Add') }}
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
        <span class="breadcrumb-item active">Add Chep</span>
      </nav>
    </div><!-- br-pageheader -->
    
    <div class="br-pagebody">
      <!-- start you own content here -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Chep Add Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('chep.view') }}" type="button" class="btn btn-primary">All Chep</a>
              </div>

           </div>
         </div>
           <div class="row">
             
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h2>Chep Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('chep.store') }}" enctype="multipart/form-data">
                        @csrf


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
                              <label>Chep Name</label>
                              <input type="text" class="form-control" placeholder="Chep Name" name = "chep_name" value = "{{ old('chep_name') }}">
                              @error ('chep_name')
                                <span class = "text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Position</label>
                              <input type="text" class="form-control" placeholder="Position" name = "position" value = "{{ old('position') }}">
                              @error ('position')
                                <span class = "text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label> Twitter Link (Optional)</label>
                              <input type="text" class="form-control" placeholder="Twitter Link" name = "s_one" value = "{{ old('s_one') }}">
                            
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Facebook Link (Optional)</label>
                              <input type="text" class="form-control" placeholder="Facebook Link" name = "s_two" value = "{{ old('s_two') }}">
                             
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>LinkedIn Link (Optional)</label>
                              <input type="text" class="form-control" placeholder="LinkedIn Link" name = "s_three" value = "{{ old('s_three') }}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Instragram Link (Optional)</label>
                              <input type="text" class="form-control" placeholder="Instragram Link" name = "s_four" value = "{{ old('s_four') }}">
                            </div>
                          </div>
                        </div>


                        <div class="form-group">
                          <label>Chep Photo</label>
                          <input type="file" class="form-control" name="image">
                           @error ('image')
                            <span class = "text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Chep</button>
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
