<!doctype html>
<html lang="en" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <!--google fonts css-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="icon" href="{{asset('front/assets/imgs/Icon.png')}}">

    <!--owl-carousel css-->
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.theme.default.min.css')}}">

    <!--style css-->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    @yield('css')

    <title>Blood Bank</title>
</head>

@foreach($blogs as $blog)
    @if(\Request::is('blog/'.$blog->id))
        <body class="article-details">
        @endif
        @endforeach


        @foreach($dons as $don)
            @if(\Request::is('singleDonation/'.$don->id))
                <body class="inside-request">
                @endif
                @endforeach



@if (\Request::is('/'))
    <body>
    @elseif(\Request::is('contact'))
        <body class="contact-us">
    @elseif(\Request::is('about'))
        <body class="who-are-us">
     @elseif(\Request::is('donation'))
            <body class="donation-requests">

            @elseif(\Request::is('signup'))
                <body class="create">

                @elseif(\Request::is('signin'))
                    <body class="signin-account">



                @endif


<!--upper-bar-->
<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="language">
                    <a href="index.html" class="ar active">????????</a>
                    <a href="index-ltr.html" class="en inactive">EN</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="social">
                    <div class="icons">
                        <a href="{{$settings->fb_link}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$settings->inst_link}}" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{$settings->tw_link}}" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="{{$settings->yt_link}}" class="whatsapp"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <!-- not a member-->
            <div class="col-lg-4">
                <div class="info" dir="ltr">
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        <p>+966506954964</p>
                    </div>
                    <div class="e-mail">
                        <i class="far fa-envelope"></i>
                        <p>name@name.com</p>
                    </div>
                </div>

                <!--I'm a member

                <div class="member">
                    <p class="welcome">???????????? ????</p>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ???????? ????????
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="index-1.html">
                                <i class="fas fa-home"></i>
                                ????????????????
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-user"></i>
                                ????????????????
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-bell"></i>
                                ?????????????? ??????????????????
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-heart"></i>
                                ??????????????
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-comments"></i>
                                ??????????
                            </a>
                            <a class="dropdown-item" href="contact-us.html">
                                <i class="fas fa-phone-alt"></i>
                                ?????????? ????????
                            </a>
                            <a class="dropdown-item" href="index.html">
                                <i class="fas fa-sign-out-alt"></i>
                                ?????????? ????????????
                            </a>
                        </div>
                    </div>
                </div>

                -->

            </div>
        </div>
    </div>
</div>


<!--nav-->
<div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('front/assets/imgs/logo.png')}}" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">???????????????? <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('articles')}}">????????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('donation')}}">?????????? ????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">???? ??????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">???????? ??????</a>
                    </li>
                </ul>

                @if(!auth('client')->user())

                    <div class="accounts">
                        <a href="{{route('signup')}}" class="create">?????????? ???????? ????????</a>
                        <a href="{{route('signin')}}" class="signin">????????????</a>
                    </div>


                @else

                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth('client')->user()->name}}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('donation')}}">Donation Requests</a>
                            <a class="dropdown-item" href="{{route('articles')}}">Articles</a>
                            <a class="dropdown-item" href="{{ route('signout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="text-dark ti-hand-point-left"></i>Logout</a>
                            <form id="logout-form" action="{{ route('signout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>


                 @endif






                <!--I'm a member

                <a href="#" class="donate">
                    <img src="imgs/transfusion.svg">
                    <p>?????? ????????</p>
                </a>

                -->

            </div>
        </div>
    </nav>
</div>

<!-- start content -->
@yield('content')
<!--end content-->
<!--footer-->
<div class="footer">
    <div class="inside-footer">
        <div class="container">
            <div class="row">
                <div class="details col-md-4">
                    <img src="{{asset('front/assets/imgs/logo.png')}}">
                    <h4>?????? ????????</h4>
                    <p>
                        ?????? ???????? ???? ???????? ?????? ???????? ???? ???????????? ???? ?????? ???????????????? ?????? ???? ?????????? ?????? ???????? ???? ???????? ???????? ?????????????? ?????? ?????????? ???? ???????? ?????? ?????? ???????? ???? ???????????? ???? ???????????? ???????????? ?????????? ??????.
                    </p>
                </div>
                <div class="pages col-md-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" href="index.html" role="tab" aria-controls="home">????????????????</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" href="#" role="tab" aria-controls="profile">???? ?????? ????????</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" href="#" role="tab" aria-controls="messages">????????????????</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" href="donation-requests.html" role="tab" aria-controls="settings">?????????? ????????????</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" href="who-are-us.html" role="tab" aria-controls="settings">???? ??????</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" href="contact-us.html" role="tab" aria-controls="settings">???????? ??????</a>
                    </div>
                </div>
                <div class="stores col-md-4">
                    <div class="availabe">
                        <p>?????????? ??????</p>
                        <a href="#">
                            <img src="{{asset('front/assets/imgs/google1.png')}}">
                        </a>
                        <a href="#">
                            <img src="{{asset('front/assets/imgs/ios1.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="other">
        <div class="container">
            <div class="row">
                <div class="social col-md-4">
                    <div class="icons">
                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="rights col-md-8">
                    <p>???????? ???????????? ???????????? ???? <span>?????? ????????</span> &copy; 2019</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
   <script src="{{asset('front/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>

<script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('front/assets/js/main.js')}}"></script>
@yield('script')
</body>
</html>
