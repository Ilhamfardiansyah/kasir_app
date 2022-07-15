    <div class="app-header-inner noprint">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">

                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>
                    <!--//col-->
                    <div class="search-mobile-trigger d-sm-none col">
                        <i class="search-mobile-trigger-icon fas fa-search"></i>
                    </div>
                    <!--//col-->
                    <div class="app-search-box col">
                        <script type="text/javascript">
                            function display_c() {
                                var refresh = 1000; // Refresh rate in milli seconds
                                mytime = setTimeout('display_ct()', refresh)
                            }

                            function display_ct() {
                                var x = new Date()
                                document.getElementById('ct').innerHTML = x;
                                display_c();
                            }
                        </script>
                        </head>

                        <body onload=display_ct();>
                            <span id='ct'></span>
                    </div>

                    <!--//app-search-box-->
                    <div class="app-utilities col-auto">
                        <!--//app-utility-item-->
                        <div class="temp">
                            <div class="app-utility-item">
                                <a href="#" title="Settings"> {{ Auth::user()->name }},
                                    {{ Auth::user()->nik }}
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                </a>
                            </div>
                        </div>
                        <!--//app-utility-item-->
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-expanded="false">
                                    <img class="avatar" src="{{ asset('/storage/images/' . Auth::user()->image) }}"
                                        alt="user profile">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                    <li><a class="dropdown-item" href="{{ url('/account') }}">My Proffile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><button class="dropdown-item" id="logout-form">Log Out</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!--//app-user-dropdown-->
                </div>
                <!--//app-utilities-->
            </div>
            <!--//row-->
        </div>
        <!--//app-header-content-->
    </div>
    <!--//container-fluid-->
    </div>
    <!--//app-header-inner-->
