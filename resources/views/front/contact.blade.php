@extends('front.master')

@section('content')

    <!--contact-us-->
    <div class="contact-now mt-4 mb-4">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods mt-4">
                <div class="col-md-6 bg-white">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content bg-white">
                            <div class="logo">
                                <img src="{{asset('front/assets/imgs/logo.png')}}">
                            </div>
                            <div class="details ">
                                <ul>
                                    <li><span>الجوال:</span> {{$settings->phone}}</li>
                                    <li><span>فاكس:</span> {{$settings->phone}}</li>
                                    <li><span>البريد الإلكترونى:</span> {{$settings->email}}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons d-flex" dir="ltr">
                                    <div class="out-icon">
                                        <a href="{{$settings->fb_link}}"><img src="{{asset('front/assets/imgs/001-facebook.svg')}}" style="width: 50px;height: 50px"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->tw_link}}"><img src="{{asset('front/assets/imgs/002-twitter.svg')}}"  style="width: 50px;height: 50px"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->yt_link}}"><img src="{{asset('front/assets/imgs/003-youtube.svg')}}"  style="width: 50px;height: 50px"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->inst_link}}"><img src="{{asset('front/assets/imgs/004-instagram.svg')}}"  style="width: 50px;height: 50px"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->fb_link}}"><img src="{{asset('front/assets/imgs/005-whatsapp.svg')}}"  style="width: 50px;height: 50px"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bg-light">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @include('admin.errors')
                            <form method="post" action="{{route('contactForm')}}">
                                @csrf
                                <input type="text"  class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="name">
                                <input type="email"  class="form-control" id="exampleFormControlInput1" placeholder="البريد الإلكترونى" name="email">
                                <input type="text"  class="form-control" id="exampleFormControlInput1" placeholder="الجوال" name="phone">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان الرسالة" name="title">
                                <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
                                <button type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
