@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Dashboard | TableBook Edit') }}
@endsection
@section('tablebook')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
        <span class="breadcrumb-item active">Edit TableBook</span>
      </nav>
    </div><!-- br-pageheader -->
    
    <div class="br-pagebody">
      <!-- start you own content here -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                    <h2>Edit TableBook</h2>
                 </div>
                 <div class="card-body">

                  {{ $tablebooks_info }}}


                   {{-- <form method="post" action = "{{ route('tablebook.update',$tablebook_info->id) }}">
                    @csrf
                    @method('PATCH')
                   
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>People</label>
                          <input type="text" class="form-control" placeholder="People" name = "people" value = "{{ $tablebook_info->people }}">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date</label>
                          <input type="date" class="form-control" name = "date" value = "{{ $tablebook_info->date }}"> 
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Time</label>
                          <input type="time" class="form-control" name = "time" value = "{{ $tablebook_info->time }}">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" placeholder="Name" name = "name" value = "{{ $tablebook_info->name }}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" placeholder="Email" name = "email" value = "{{ $tablebook_info->email }}">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" class="form-control" placeholder="Phone" name = "phone" value = "{{ $tablebook_info->phone }}">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update TableBook</button>
                  </form> --}}
                  

                 </div>
            </div>
           </div>

         </div>
       </div>

     </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

@endsection
