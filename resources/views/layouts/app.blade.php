<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap')}}"
          rel="stylesheet">

    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('user2/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('user2/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('user2/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('user2/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('user2/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('user2/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('user2/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('user2/css/style.css')}}" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="">
    <div class="loader"></div>
</div>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__hover">
                            <span>{{__('messages.profile')}}<i class="arrow_carrot-down"></i></span>
                            <ul style="">
                                @guest
                                    @if (Route::has('login.form'))
                                        <li>
                                            <a style="color: black" href="{{ route('login.form') }}">{{ __('messages.login') }}</a>
                                        </li>
                                    @endif

                                        @if (Route::has('register.form'))
                                            <li>
                                                <a style="color: black" href="{{ route('register.form') }}">{{ __('messages.register') }}</a>
                                            </li>
                                        @endif
                                @else
                                   <div>
                                     <ul style="margin-top: -17px">
                                         <li>
                                             <a style="color: black;" href="{{route('profile')}}">
                                                 {{__('messages.profile')}}
                                             </a>
                                         </li>
                                         <li>
                                             <a style="color: black;" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                 {{__('messages.logout')}}
                                             </a>

                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                 @csrf
                                             </form>
                                         </li>
                                     </ul>
                                   </div>
                                @endguest
                            </ul>
                        </div>
                        <div class="header__top__hover" style="margin-left: 30px">
                            <span>{{ config('app.languages') [app()->getLocale()]}}<i class="arrow_carrot-down"></i></span>
                            <ul>
                                <li>
                                @foreach(config('app.languages') as $ln => $lang)
                                    <a style="color: black" href="{{route('switch.lang', $ln)}}">
                                        {{$lang}}
                                    </a>
                                @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="#"><img src="{{asset('user2/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        @can('viewAny1', \App\Models\Shop::class)
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('adm.shops.product')}}">AdminPanel</a></li>
                        @endcan
                        <li><a href="{{route('shops.index')}}">{{__('messages.home')}}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="{{route('cart.index')}}"><img src="{{asset('user2/img/icon/cart.png')}}" alt="" style="width:25px "></a>
                    <a href="{{route('wallet.index')}}"><img src="{{asset('user2/img/icon/wallet.png')}}" alt="" style="width:25px "></a>
                </div>
            </div>
        </div>
    </div>
</header>


{{-- Message --}}
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('message') }}<strong>!</strong>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('error') }}<strong>!</strong>
        </div>
    @endif

<!-- Shop Section Begin -->
<div class="container" style="margin-top: 50px; margin-bottom: 200px;">
    @yield('content')
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="{{asset('user2/img/footer-logo.png')}}" alt=""></a>
                    </div>
                    <p>The customer is at the heart of our unique business model, which includes design.</p>
                    <a href="#"><img src="{{asset('user2/img/payment.png')}}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p>Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>2020
                        All rights reserved
                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{asset('user2/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('user2/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user2/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('user2/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('user2/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('user2/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('user2/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('user2/js/mixitup.min.js')}}"></script>
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('user2/js/main.js')}}"></script>
</body>

</html>
