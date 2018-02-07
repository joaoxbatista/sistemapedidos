<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet" />


</head>
<body>

<div class="wrapper" id="app">
    <div class="sidebar" data-color="green" data-image="{{ asset('img/sidebar-2.jpg') }}">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('admin-dashboard.index') }}" class="simple-text">
                    hbioss.pedidos
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{ route('admin-dashboard.index') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-dashboard.profile.index') }}">
                        <i class="pe-7s-user"></i>
                        <p>Perfil</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-dashboard.business.setting.index') }}">
                        <i class="pe-7s-tools"></i>
                        <p>Configurações</p>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin-dashboard.clients.index') }}">
                        <i class="pe-7s-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin-dashboard.stock') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Estoque</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-dashboard.reports') }}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Relatórios</p>
                    </a>
                </li>
               
                <li>
                    <a href="{{ route('admin-dashboard.orders.index') }}">
                        <i class="pe-7s-cart"></i>
                        <p>Pedidos</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">@yield('title')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="{{ route('logout') }}">
                                <p class="hidden-lg hidden-md"> <i class="fa fa-power-off"></i> Sair</p>
                            </a>
                        </li>
                    </ul>
                </div>
                    
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
    
    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('js/bootstrap-checkbox-radio-switch.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{ asset('js/light-bootstrap-dashboard.js') }}"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="{{ asset('js/demo.js') }}"></script>

    @yield('scripts')

</body>
    

</html>
