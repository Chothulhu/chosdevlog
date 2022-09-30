<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('panel/assets/images/favicon.png')}}" >
        {{ asset('')}}
        <!--Page title-->
        <title>Admin easy Learning</title>
        <!--bootstrap-->
        <link rel="stylesheet" href="{{ asset('panel/assets/css/bootstrap.min.css')}}">
        <!--font awesome-->
        <link rel="stylesheet" href="{{ asset('panel/assets/css/all.min.css')}}">
        <!-- metis menu -->
        <link rel="stylesheet" href="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
        <!-- chart -->
   
        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
        <!--Custom CSS-->
        <link rel="stylesheet" href="{{ asset('panel/assets/css/style.css')}}">
        
    </head>
    <body id="page-top">
        <!-- preloader -->
        <div class="preloader">
            <img src="{{ asset('panel/assets/images/preloader.gif')}}" alt="">
        </div>
        <!-- wrapper -->
        <div class="wrapper">
         
            




        
            <!-- header area -->
            <header class="header_area">
                <!-- logo -->
                <div class="sidebar_logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('/images/cho_logo_transparent.png')}}" alt="" class="img-fluid logo1">
                        <img src="{{ asset('/images/cho_logo_transparent.png')}}" alt="" class="img-fluid logo2">
                    </a>
                </div>
                <div class="sidebar_btn">
                    <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
                </div>
                <ul class="header_menu">
                    <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                            <div class="user_item dropdown-menu dropdown-menu-right">
                                <div class="admin">
                                    <a href="#" class="user_link"><img src="panel/assets/images/admin.jpg" alt=""></a>
                                </div>
                            <ul>  
                                <li><a href="#"><span><i class="fas fa-user"></i></span> User Profile</a></li>
                                <li><a href=" "><span><i class="fas fa-cogs"></i></span>  Password Change</a></li>
                                <li><a href="{{ route('admin.logout') }}"><span><i class="fas fa-unlock-alt"></i></span> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
                </ul>
            </header><!-- / header area -->
            <!-- sidebar area -->
            <aside class="sidebar-wrapper ">
                <nav class="sidebar-nav">
                    <ul class="metismenu" id="menu1">
                        <!-- my items -->
                        <li class="single-nav-wrapper">
                            <a href="{{ route('admin.manage.games') }}" class="menu-item">
                                <span class="left-icon"><i class="fas fa-file"></i></span>
                                <span class="menu-text">Games</span>
                            </a>
                        </li>
                        <li class="single-nav-wrapper">
                            <a href="{{ route('admin.manage.users') }}" class="menu-item">
                                <span class="left-icon"><i class="fas fa-sort-alpha-down-alt"></i></span>
                                <span class="menu-text">Users</span>
                            </a>
                        </li>
                        <li class="single-nav-wrapper">
                            <a href="{{ route('admin.manage.comments') }}" class="menu-item">
                                <span class="left-icon"><i class="fas fa-home"></i></span>
                                <span class="menu-text">Comments</span>
                            </a>
                        </li>

                        @if(Auth::guard('admin')->user()->status === 'admin')
                        <li class="single-nav-wrapper">
                            <a href="{{ route('admin.manage.managers') }}" class="menu-item">
                                <span class="left-icon"><i class="fas fa-home"></i></span>
                                <span class="menu-text">Managers</span>
                            </a>
                        </li>
                        @endif

                        <!-- end my items -->                   
                </nav>
            </aside><!-- /sidebar Area-->


            @yield('admin')

        </div><!--/ wrapper -->


        
        <!-- jquery -->
        <script src="{{ asset('panel/assets/js/jquery.min.js')}}"></script>
        <!-- popper Min Js -->
        <script src="{{ asset('panel/assets/js/popper.min.js')}}"></script>
        <!-- Bootstrap Min Js -->
        <script src="{{ asset('panel/assets/js/bootstrap.min.js')}}"></script>
        <!-- Fontawesome-->
        <script src="{{ asset('panel/assets/js/all.min.js')}}"></script>
        <!-- metis menu -->
        <script src="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
        <script src="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
        <!-- nice scroll bar -->
        <script src="{{ asset('panel/assets/plugins/scrollbar/jquery.nicescroll.min.js')}}"></script>
        <script src="{{ asset('panel/assets/plugins/scrollbar/scroll.active.js')}}"></script>
        <!-- counter -->
        <script src="{{ asset('panel/assets/plugins/counter/js/counter.js')}}"></script>
        <!-- chart -->
   <script src="{{ asset('panel/assets/plugins/chartjs-bar-chart/Chart.min.js')}}"></script>
        <script src="{{ asset('panel/assets/plugins/chartjs-bar-chart/chart.js')}}"></script>
        <!-- pie chart -->
        <script src="{{ asset('panel/assets/plugins/pie_chart/chart.loader.js')}}"></script>
        <script src="{{ asset('panel/assets/plugins/pie_chart/pie.active.js')}}"></script>
 
 
        <!-- Main js -->
        <script src="{{ asset('panel/assets/js/main.js')}}"></script>

    
     


    </body>
</html>