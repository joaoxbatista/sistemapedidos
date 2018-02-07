<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
        @yield('styles')
    </head>
    <body>

        <div class="content">
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

        @yield('scripts')
    </body>
</html>
