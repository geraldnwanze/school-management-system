<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('dashboard/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

</head>
<style>
    .blink {
        animation: blinker 2s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <!-- <img class="" style="width: 200px;" src="{{ asset('main/assets/css/exactLogo1.png') }}" alt=""> -->
                <!-- <img class="logo-compact" src="{{ asset('main/assets/css/exactLogo1.png') }}" alt=""> -->
                <!-- <img class="brand-title" src="{{ asset('dashboard/images/logo-text.png') }}" alt=""> -->
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <div class="nav-link" role="button">
                                    <form action="{{ route('dashboard.logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">LogOut</button>
                                    </form>
                                </div>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <div class="quixnav">
            <div class="quixnav-scroll">

                @auth
                    <ul class="metismenu" id="menu">

                    <li>
                        <h4 style="color:azure;">
                            {{ auth()->user()->role }}
                        </h4>
                    </li>

                    <li>
                        <a class="" href="{{ route('dashboard.'.auth()->user()->role.'.index') }}" aria-expanded="false"><i
                                class="fa fa-dashboard"></i><span class="nav-text">Dashboard</span></a>
                    </li>

                        @if (superadmin())
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-gears"></i><span class="nav-text">Setup</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('dashboard.school.index') }}">School</a></li>
                                <li><a href="#">Classrooms</a></li>
                                <li><a href="#">Subjects</a></li>
                                <li><a href="#">Grades</a></li>
                                <li><a href="#">Active Session</a></li>
                                <li><a href="#">Teachers to Subjects</a></li>
                                <li><a href="#">Subjects to Classes</a></li>
                                <li><a href="#">Teachers to Classes</a></li>
                            </ul>
                        </li>

                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                        class="fa fa-users"></i><span class="nav-text">Users</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="{{route('dashboard.staff.index')}}">Staff</a></li>
                                    <li><a href="{{route('dashboard.student.index')}}">Student</a></li>
                                </ul>
                            </li>

                            {{-- <li>
                                <a class="" href="{{ route('dashboard.classes.index') }}">
                                    <i class="fa fa-home"></i>
                                    <span class="nav-text">Classes</span>
                                </a>
                            </li> --}}
                            <li>
                                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-trash"></i>
                                    <span class="nav-text">Deleted Data</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li>
                                        <a href="{{ route('dashboard.sessions.deleted') }}">Sessions</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dashboard.terms.deleted') }}">Terms</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dashboard.classes.deleted') }}">Classes</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dashboard.subjects.deleted') }}">Subjects</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dashboard.grades.deleted') }}">Grades</a>
                                    </li>
                                </ul>
                            </li>

                        @endif

                    </ul>
                @endauth
            </div>

        </div>


        <div class="content-body">
            <div class="container-fluid">
                
                @yield('content')
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright ?? {{ config('app.name') }} LTD. <?php date('Y-m-d'); ?></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('dashboard/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('dashboard/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('dashboard/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('dashboard/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('dashboard/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('dashboard/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('dashboard/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


    <script src="{{ asset('dashboard/js/dashboard/dashboard-1.js') }}"></script>

</body>

<x-alert />

</html>
