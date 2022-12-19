<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title> {{$title}} </title> --}}
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-creative.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{ asset('img/icon/icon_1.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    @stack('css')
</head>

<body class="loading" data-layout="topnav"
    data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": true}'>
    <div class="wrapper">
        <div class="content-page">
            <div class="content">
                @include('clients.layout.header');
                @include('clients.layout.sidebar');
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="page-title-box">
                            <a href=" {{ route('cart.show') }} ">Giỏ hàng</a>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
            @include('clients.layout.footer')
        </div>
    </div>

    <script src=" {{ asset('js/scroll.js') }} "></script>
    <script src=" {{ asset('js/slider.js') }} "></script>

    <script src="https://kit.fontawesome.com/ba36f54e69.js" crossorigin="anonymous" async></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="{{ asset('js/scroll.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
    {{-- <script src="{{ asset('js/vendor.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/cart.js') }} "></script>
    <script src="{{ asset('js/shop.js') }} "></script>

    @stack('js')
</body>

</html>
