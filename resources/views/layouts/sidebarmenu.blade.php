<div class="left-side-menu">
    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="user-box">
    
                <div class="float-left">
                    <img src="{{ asset('backend') }}/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                John Doe <i class="mdi mdi-chevron-down"></i>
                                        </a>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-face-profile mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Settings</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-lock mr-2"></i> Lock screen</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-power-settings mr-2"></i> Logout</a></li>
                        </ul>
                    </div>
                    <p class="font-13 text-muted m-0">Administrator</p>
                </div>
            </div>

            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="{{ url('/') }}" class="waves-effect" target="_blank">
                        <i class="mdi mdi-web"></i>
                        <span> Restrurant </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tablebook.index') }}" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span> TableBooking </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('order.index') }}" class="waves-effect">
                        <i class="mdi mdi-cart-arrow-right"></i>
                        <span> Order</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-layers-triple-outline"></i>
                        <span> Banner </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('banner.index') }}">Banner Insert</a></li>
                        <li><a href="{{ route('banner.viewall') }}">Banner View</a></li>
                    </ul>
                </li>

                
                {{-- <li>
                    <a href="{{ url('about') }}" class="waves-effect">
                        <i class="mdi mdi-worker"></i>
                        <span> About </span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('category.index') }}" class="waves-effect">
                        <i class="mdi mdi-alpha-c-circle-outline"></i>
                        <span> Category </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tag.index') }}" class="waves-effect">
                        <i class="mdi mdi-alpha-c-circle-outline"></i>
                        <span> Tag </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-layers-triple-outline"></i>
                        <span> Food </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('food.index') }}">Food Insert</a></li>
                        <li><a href="{{ route('food.view') }}">Food View</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-layers-triple-outline"></i>
                        <span> Chep </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('chep.index') }}">Chep Insert</a></li>
                        <li><a href="{{ route('chep.view') }}">Chep View</a></li>
                    </ul>
                </li>


                {{-- <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-email-multiple"></i>
                        <span> Testmonial </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('testmonial.index') }}">Testmonial Insert</a></li>
                        <li><a href="{{ route('testmonial.viewall') }}">Testmonial View</a></li>
                        <li><a href="{{ route('testmonial.trashall') }}">Testmonial Trash</a></li>
                    </ul>
                </li> --}}


                {{-- <li>
                    <a href="{{ route('blog.index') }}" class="waves-effect">
                        <i class="mdi mdi-blogger"></i>
                        <span> Blog </span>
                    </a>
                </li> --}}


                <li>
                    <a href="{{ route('profile.index') }}" class="waves-effect">
                        <i class="mdi mdi-account-key"></i>
                        <span> Profile </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link">
                        <div class="sl-menu-item">
                          <i class="mdi mdi-power"></i>
                          <span class="menu-item-label">Logout</span>
                        </div><!-- menu-item -->
                      </a><!-- sl-menu-link -->
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                </li>



            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>