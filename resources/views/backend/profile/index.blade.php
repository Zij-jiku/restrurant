@extends('layouts.dashboard_app')
@section('page_title')
  {{ ('Paravel | Profile ') }}
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
       <a class="breadcrumb-item" href="{{ route('profile.index') }}">Profile</a>
       <span class="breadcrumb-item active">{{ Auth::user()->name }}</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Profile Page</h5>
         <p>This is a Profile Page</p>
       </div><!-- sl-page-title -->


       <div class="container-fluid">
         <div class="row">
           <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                    <h2>Name Change</h2>
                 </div>
                 <div class="card-body">

                   <form method="post" action = "{{ route('profile.store') }}">
                     @csrf

                     @if(session()->has('name_change'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session()->get('name_change') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     @endif
                     @if(session()->has('days_status'))
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ session()->get('days_status') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     @endif

                     <div class="form-group">
                       <label>Name Change</label>
                       <input type="text" class="form-control" placeholder="Name Change" name = "name" value="{{ Auth::user()->name }}">
                       @error ('name')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>
                     <button type="submit" class="btn btn-primary">Name Change</button>
                   </form>

                 </div>
            </div>
           </div>

           <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                    <h2>Password Change</h2>
                 </div>
                 <div class="card-body">
                   <form method="post" action = "{{ route('editpassword') }}">
                     @csrf

                     @if(session()->has('password_status'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session()->get('password_status') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     @endif
                     @if(session()->has('pass_milenai_status'))
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ session()->get('pass_milenai_status') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     @endif
                     @if(session()->has('old_pass_status'))
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ session()->get('old_pass_status') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     @endif

                     <div class="form-group">
                       <label>Current Password</label>
                       <input type="password" class="form-control" placeholder="Old Password" name = "old_password" id="button_one">
                       <div class="form-group my-2">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" onclick="one_button()">
                            <label class="form-check-label text-primary ml-2" for="invalidCheck1">
                              Show Current Password
                            </label>
                          </div>
                        </div>

                       @error ('old_password')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>New Password</label>
                       <input type="password" class="form-control" placeholder="New Password" name = "password" id="button_two">
                       <div class="form-group my-2">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" onclick="two_button()">
                            <label class="form-check-label text-primary" for="invalidCheck2">
                              Show New Password
                            </label>
                          </div>
                        </div>
                       @error ('password')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <div class="form-group">
                       <label>Confirm Password</label>
                       <input type="password" class="form-control" placeholder="Confirm Password" name = "password_confirmation" id="button_three">
                       <div class="form-group my-2">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" onclick="three_button()">
                            <label class="form-check-label text-primary" for="invalidCheck3">
                              Show Confirm Password
                            </label>
                          </div>
                        </div>
                       @error ('password_confirmation')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>
                     <button type="submit" class="btn btn-primary">Password Change</button>
                   </form>
                 </div>
            </div>
           </div>

           <div class="col-md-4">
             <div class="card">
                 <div class="card-header">
                    <h2>Profile Image Change</h2>
                 </div>
                 <div class="card-body">
                   <form method="post" action = "{{ route('profileimageupload') }}" enctype="multipart/form-data">
                     @csrf

                     

                    @if(session()->has('photo_change'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('photo_change') }}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                   @endif


                     <div class="form-group">
                       <label>Profile Image</label>
                       <input type="file" class="form-control" name = "profile_image">

                       @error ('profile_image')
                         <span class = "text-danger">{{ $message }}</span>
                       @enderror
                     </div>

                     <button type="submit" class="btn btn-primary">Profile Image Upload</button>
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
    function one_button() {
      var x = document.getElementById("button_one");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
    
    <script>
    function two_button() {
      var x = document.getElementById("button_two");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
    
    <script>
    function three_button() {
      var x = document.getElementById("button_three");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>

@endsection
