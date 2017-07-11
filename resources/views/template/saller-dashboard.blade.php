<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfect-scrollbar.min.css')}}">

    @yield('styles')
</head>
<body>

<div id="app">

    {{--<button id="button-menu"><i class="fa fa-reorder"></i></button>--}}
    <div id="side-menu">


        <div id="profile-menu">

            @if(Auth::user()->image != null)
                <img src="{{ asset('uploads/images/sellers/'.Auth::user()->image)}}" alt="" id="profile-image">
            @else
                <img src="{{ asset('imgs/img-profile.png')}}" alt="" id="profile-image">
            @endif

            <div id="content-profile-menu">
                <p id="profile-username">
                    {{ Auth::user()->name }}
                </p>

            </div>

        </div>

        <div id="content-side-menu">

            <div class="group-menu">
                <h3><i class="fa fa-circle-o-notch"></i> Gerência</h3>
                <nav>
                    <li><a href="{{ route('saller.dashboard') }}"><i class="fa fa-dashboard"></i> Painel</a></li>

                    <li><a href="{{ route('saller.product') }}"><i class="fa fa-archive"></i> Produtos</a></li>
                    <li><a href="{{ route('saller.clients') }}"><i class="fa fa-group"></i> Clientes</a></li>
                    <li><a href="{{ route('saller.orders')}}"><i class="fa fa-shopping-cart"></i> Pedidos</a></li>

                </nav>
            </div>


            <div class="group-menu">
                <h3><i class="fa fa-circle-o-notch"></i> Configurações</h3>
                <nav>
                    <li><a href="{{ route('saller.profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="{{ route('saller.logout') }}"><i class="fa fa-power-off"></i>Sair</a></li>
                </nav>
            </div>


        </div>

    </div>
    <div id="content">

        <div id="alert-area">
            @if(session()->has('success-message'))
                <div class="alert alert-success">
                    {{ session()->get('success-message') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')
    </div>
</div>

<!-- Importação dos Scrips JS-->
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{ asset('js/menu.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#content').perfectScrollbar({
            wheelSpeed: 6
        });
        $('#side-menu').perfectScrollbar();

        $("#side-menu").find(".ps-scrollbar-y-rail").css({"opacity":0});
    });
</script>

@yield('scripts')
</body>
</html>
