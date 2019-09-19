<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/')}}/assets/images/favicon.png">
    <title>Contas</title>
    <!-- Custom CSS -->
    <link href="{{URL::to('/')}}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('/')}}/dist/css/style.min.css" rel="stylesheet">

    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body>

   
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
       
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    
                    <div class="navbar-brand">
                        <a href="{{route('dashboard.index')}}" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                               
                                <img src="{{URL::to('/')}}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{URL::to('/')}}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="{{URL::to('/')}}/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{URL::to('/')}}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                  
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> Editar</a>
                                <a class="dropdown-item" href="{{ route('home.sair') }}"><i class="ti-email m-r-5 m-l-5"></i> Sair</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
               
            </nav>
        </header>
       
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"href="{{route('dashboard.index')}}">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Inicio</span>
                            </a>
                        </li> 
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"href="{{route('dashboard.show')}}">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Exibir contas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false"href="{{route('dispesas.show')}}">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Exibir despesas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false"href="{{route('conta.create')}}">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Cadastrar contas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false"href="{{route('dispesas.index')}}">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Cadastrar despesas</span>
                            </a>
                        </li>
                  
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
        <div class="page-wrapper">
            @yield('wrapper')

        </div>
       
    </div>
   
    <script src="{{URL::to('/')}}/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{URL::to('/')}}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{URL::to('/')}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{URL::to('/')}}/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{URL::to('/')}}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{URL::to('/')}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{URL::to('/')}}/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{URL::to('/')}}/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{URL::to('/')}}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="{{URL::to('/')}}/dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>