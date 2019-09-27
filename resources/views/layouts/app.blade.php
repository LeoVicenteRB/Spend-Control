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

    <script src="{{URL::to('/')}}/assets/libs/jquery/dist/jquery.min.js"></script>
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
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <ul class="navbar-nav float-left mr-auto"></ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="{{ route('user.edit') }}"><i class="ti-user m-r-5 m-l-5"></i> Editar</a>
                                <a class="dropdown-item" href="{{ route('home.sair') }}"><i class="ti-user m-r-5 m-l-5"></i> Sair</a>
                            </div>
                        </li>
            
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false"href="{{route('extra.show')}}">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Histórico de Extras</span>
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
                           <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false"href="{{route('extra.create')}}">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Cadastrar Extras</span>
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
<style type="text/css">
   .switch {
  position: relative;
  display: inline-block;
  width:40px;
  height: 24px;
  float:right;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.default:checked + .slider {
  background-color: #444;
}
input.primary:checked + .slider {
  background-color: #2196F3;
}
input.success:checked + .slider {
  background-color: #8bc34a;
}
input.info:checked + .slider {
  background-color: #3de0f5;
}
input.warning:checked + .slider {
  background-color: #FFC107;
}
input.danger:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(16px);
  -ms-transform: translateX(16px);
  transform: translateX(16px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

</html>