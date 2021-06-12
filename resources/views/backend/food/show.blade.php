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
       <span class="breadcrumb-item active">food</span>
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
                <a href = "{{ route('food.index') }}" type="button" class="btn btn-success">Add Food</a>
              </div>


           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Food View</h2>
                          <hr>
                         {{-- <h4>Total food : {{ $total_food }}</h4> --}}
                       </div>
                       <div class="card-body">
                         @if(session()->has('trash_status'))
                           <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                              {{ session()->get('trash_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif

                         @if(session()->has('mark_trash'))
                         <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                            {{ session()->get('mark_trash') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif

                         
                       

                        <table class="table" id = "data_tables">
                          <thead>
                            <tr>


                              <th>SL No.</th>
                              <th>Food Name</th>
                              <th>Category Name</th>
                              <th>Tag Name</th>
                              <th>Price</th>
                              <th>Code</th>
                              <th>F.Q</th>
                              <th>A.Q</th>
                              <th>Short Description</th>
                              <th>Image</th>
                              <th>Big Image</th>
                              <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                            @forelse($food_all as $food)

                            <tr class = " {{ ($food->quantity <= $food->alert_quantity) ? 'table-danger' : '' }}">


                              <td>{{ $loop->index + 1 }}</td>
                              <td>{{ Str::limit($food->food_name , 10) }}</td>

                              <td> Cat name </td>
                              <td> Tag Name </td>

                              <td>{{ $food->price }}</td>
                              <td>{{ $food->code }}</td>
                              <td>{{ $food->quantity }}</td>
                              <td>{{ $food->alert_quantity }}</td>
                              <td>{{ Str::limit($food->short_description , 10) }}</td>
                              <td>
                                <img src="{{ asset('uploads/food_photos') }}/{{ $food->image }}" alt="" width="100">
                              </td>
                              <td>
                                <img src="{{ asset('uploads/food_photos') }}/{{ $food->big_image }}" alt="" width="100">
                              </td>
                              <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href = "{{ route('food.edit' , $food->id) }}" type="button" class="btn btn-primary">Edit</a>

                                  <form action="{{ route('food.destroy' , $food->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>

                                </div>

                              </td>
                            </tr>
                            @empty
                              <tr>
                                <td class = "text-danger text-center" colspan="50">No Data Available</td>
                              </tr>
                          @endforelse

                          </tbody>
                        </table>
  

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


<script>
  $("#checkAll").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
  </script>
  
  <script>
  $("#checkall").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
  </script>


@endsection
