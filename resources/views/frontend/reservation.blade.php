@extends('layouts.frontend')

@section('frontend_content')
    <main>
        <!-- PAGE INFO -->
        <section class="page-info set-bg" data-image-src="{{ asset('frontend') }}/images/page-info-bg-2.jpg">
            <div class="section-header">
                <h1 class="text-white">Reservatoin</h1>
                <span>~ For the best location ~</span>
            </div>
        </section>

        <!-- FORM -->
        <section class="section-primary section-form pb-120">
            <div class="container">
                <div class="section-header">
                    <h2>Book a table</h2>
                    <span>~ Check out our place ~</span>
                </div>
                
                
                @if(session()->has('success_status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success_status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif



                <form method="post" action="{{ route('tablebook.store') }}">
					@csrf

                    

                    <div class="form-inner">
                        <div class="form-col">
                            <div class="select">
                                <div class="form-holder">
                                   <input type="number" class="form-control" data-language='en' placeholder="People" name="people" value="{{ old('people') }}">
                                  <span class = "text-danger">(Can't add more than 1000 people)</span>
                                </div>
                                @error ('people')
                                      <span class = "text-danger">{{ $message }}</span>
                                  @enderror
                              
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-holder">
                                <input type="date" class="form-control style" data-language='en' name="date" value="{{ old('date') }}">
                                <span class="lnr lnr-calendar-full big primary-color"></span>


                                @error ('date')
                                <span class = "text-danger">{{ $message }}</span>
                               @enderror


                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-holder">
                                <input type="time" class="form-control style" placeholder="Time" name="time" value="{{ old('time') }}">
                                <span class="lnr lnr-clock big primary-color"></span>
                                @error ('time')
                                <span class = "text-danger">{{ $message }}</span>
                               @enderror
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-holder">
                                <input type="text" class="form-control style" placeholder="Name" name="name" value="{{ old('name') }}">
                                @error ('image')
                                <span class = "text-danger">{{ $message }}</span>
                               @enderror
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-holder">
                                <input type="text" class="form-control style" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                @error ('phone')
                                <span class = "text-danger">{{ $message }}</span>
                               @enderror
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-holder">
                                <input type="text" class="form-control style" placeholder="Email" name="email" value="{{ old('email') }}">
                                @error ('email')
                                <span class = "text-danger">{{ $message }}</span>
                               @enderror
                            </div>
                        </div>
                    </div>
                    <div class="btn-holder">
                        <button class="au-btn round au-btn--hover has-bg">Book now</button>
                    </div>
                </form>			
            </div>
        </section>
    </main>   
@endsection

		