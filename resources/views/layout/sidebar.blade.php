@php
    if (session()->has('user')) {
        // Key exists, retrieve the user
        $user = session('user');
   
    }
@endphp

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>
</head>




<div class="container-scroller">
   
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row  mt-3">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('images/Lion_Air_logo.png')}}" alt="logo"></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/logo-mini.svg')}}"
                    alt="logo"></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize"
                fdprocessedid="kdqxmg">
                <span class="mdi mdi-menu"></span>
            </button>
            <!-- <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div> -->
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile">
                    <a class="nav-link " id="profileDropdown" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{asset('images/faces/face1.jpg')}}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{$user->name}}</p>
                        </div>
                    </a>

                </li>
              

                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="{{route('logout')}}">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
 
    <!-- page-body-wrapper ends -->
</div>


<div class="container-fluid page-body-wrapper pt-0">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="{{asset('images/faces/face1.jpg')}}" alt="profile">
                        <span class="login-status online"></span>
                        <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">{{$user->name}}</span>
                        <span class="text-secondary text-small">{{$user->type   }}</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashbord')}}">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('trips.list')}}" >
                    <span class="menu-title">Trips</span>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
              
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('cargos.list')}}">
                    <span class="menu-title">Cargo</span>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
             
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('locations.list')}}">
                    <span class="menu-title">Locations</span>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
             
            </li>
         
            {{-- href="#companys"  data-bs-toggle="collapse"   aria-expanded="false"
                    aria-controls="ui-basic" --}}
            <li class="nav-item">
                <a class="nav-link"  href="{{route('companys.list')}}">
                    <span class="menu-title">Companys</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                <div class="collapse" id="companys">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="pages/ui-features/buttons.html">Buttons</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="pages/ui-features/typography.html">Typography</a></li>
                    </ul>
                </div>
            </li>
            


            <li class="nav-item">
                <a class="nav-link"  href="{{route('buss.list')}}" 
                 >
                    <span class="menu-title">Buses</span>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
              
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#accounts" aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-title">Accounts</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                <div class="collapse" id="accounts">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="pages/ui-features/buttons.html">Income</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="pages/ui-features/typography.html">Expenses</a></li>
                    </ul>
                </div>
            </li>
           
          
            <li class="nav-item">
                <a class="nav-link" href="{{route('tickets.list')}}" 
                    aria-controls="ui-basic">
                    <span class="menu-title">Tickets</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                <div class="collapse" id="tickets">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="pages/ui-features/buttons.html">Buttons</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="pages/ui-features/typography.html">Typography</a></li>
                    </ul>
                </div>
            </li>
           

                <div class="collapse">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> images
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> videos </a>
                        </li>

                    </ul>
                </div>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#reports" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-title">Reports</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    </a>
                    <div class="collapse" id="reports">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link"
                                    href="pages/ui-features/buttons.html">Buttons</a></li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="pages/ui-features/typography.html">Typography</a></li>
                        </ul>
                    </div>
                </li>
         
            <!-- usrs -->
            <li class="nav-item">
                <a class="nav-link" href="pages/tables/basic-table.html">
                    <span class="menu-title">Users</span>
                    <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>

           
        </ul>
    </nav>


    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/hoverable-collapse.js')}}"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{asset('js/todolist.js')}}"></script>


    <div class="main-panel">
        <div class="content-wrapper">