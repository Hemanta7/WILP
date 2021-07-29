<nav class="navbar navbar-expand navbar-dark bg-dark user-nav-top p-0">
    <div class="container">
        <a class="navbar-brand mr-2" href="{{ url('/') }}"><img src="img/logo.png" alt="">
        </a>
        <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control shadow-none border-0"
                    placeholder="Search people,companies & more..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn" type="button">
                        <i class="feather-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto d-flex align-items-center">
            {{-- Dropdown Search Box --}}
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="feather-search mr-2"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control border-0 shadow-none"
                                placeholder="Search people,companies and more..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" type="button">
                                    <i class="feather-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="company.html"><i class="feather-briefcase mr-2"></i><span
                        class="d-none d-lg-inline">Companies</span></a>
            </li> --}}
            {{-- Connection Here / If Needed --}}
            {{-- <li class="nav-item dropdown no-arrow mx-1 user-list-dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="feather-bell"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-info badge-counter">6</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="feather-download-cloud text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 12, 2019</div>
                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                                <i class="feather-edit text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 7, 2019</div>
                            $290.29 has been deposited into your account!
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="feather-folder text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>
                            Spending Alert: We've noticed unusually high spending for your account.
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                </div>
            </li> --}}
            @auth
                {{-- If Logged-in / Dropdown Menu --}}
                <li class="nav-item dropdown no-arrow ml-1 user-profile-dropdown">
                    <a class="nav-link dropdown-toggle pr-0 strong" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }} <img
                            class="img-profile rounded-circle ml-2"
                            src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name . '+' . auth()->user()->last_name }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow-sm">
                        <div class="p-3 d-flex align-items-center">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle"
                                    src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name . '+' . auth()->user()->last_name }}"
                                    alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">
                                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div>
                                <div class="small text-gray-500">{{ auth()->user()->occupation }}</div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('customer.profile') }}"><i class="feather-user mr-1"></i>
                            Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="feather-log-out mr-1"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth
            @guest
                {{-- If Not Logged-in / Dropdown Menu --}}
                <li class="nav-item dropdown no-arrow ml-1 user-profile-dropdown">
                    <a class="nav-link dropdown-toggle pr-0" href="{{ url('/login') }}">
                        Login
                    </a>
                </li>
                <li class="nav-item dropdown no-arrow ml-1 user-profile-dropdown">
                    <a class="nav-link dropdown-toggle pr-0" href="{{ url('/register') }}">
                        Register
                    </a>
                </li>
            @endguest

        </ul>
    </div>
</nav>
