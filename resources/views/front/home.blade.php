@extends('front.master')

@section('content')


    <!--intro-->
    <div class="intro">
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-1 active" style="background-image:url('{{asset('front/assets/imgs/header1.jpg')}}')">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                {{$settings->notification_setting_text}}                            </p>
                            <a href="{{route('about')}}">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-2" style="background-image:url('{{asset('front/assets/imgs/header1.jpg')}}')">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                {{$settings->notification_setting_text}}                            </p>
                            <a href="{{route('about')}}">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-3" style="background-image:url('{{asset('front/assets/imgs/header1.jpg')}}')">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                {{$settings->notification_setting_text}}                            </p>
                            <a href="{{route('about')}}">المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--about-->
    <div class="about" style="background-image:url('{{asset('front/assets/imgs/about2.png')}}')">
        <div class="container">
            <div class="col-lg-6 text-center">
                <p>
                    <span>بنك الدم</span> هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ.
                </p>
            </div>
        </div>
    </div>

    <!--articles-->
    <div class="articles">
        <div class="container title">
            <div class="head-text">
                <h2>المقالات</h2>
            </div>
        </div>
        <div class="view">
            <div class="container">
                <div class="row">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel articles-carousel">
                        @foreach($posts as $post)
                        <div class="card">
                            <div class="photo">
                                <img src="{{asset('uploads/posts/'.$post->img)}}" class="card-img-top" alt="...">
                                <a href="{{route('blog',$post->id)}}" class="click">المزيد</a>
                            </div>
                            <a href="#" class="favourite">
                                <i id="{{$post->id}}" onclick="toggleFavourite($this)" class="far fa-heart {{$post->isfavourite?"second-heart":"first-heart"}}"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">
                                    {{$post->desc}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--requests-->
    <div class="requests">
        <div class="container">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form class="row filter">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    <option>+A</option>
                                    <option>+B</option>
                                    <option>+AB</option>
                                    <option>-O</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر المدينة</option>
                                    <option>المنصورة</option>
                                    <option>القاهرة</option>
                                    <option>الإسكندرية</option>
                                    <option>سوهاج</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="patients">
                    @foreach($donations as $don)
                    <div class="details">
                        <div class="blood-type">
                            <h2 dir="ltr">{{$don->BloodType->name}}</h2>
                        </div>
                        <ul>
                            <li><span>اسم الحالة:</span>{{$don->name}}</li>
                            <li><span>مستشفى:</span>{{$don->hospital_address}}</li>
                            <li><span>المدينة:</span> {{$don->city->name}}</li>
                        </ul>
                        <a href="{{route('singleDonation',$don->id)}}">التفاصيل</a>
                    </div>
                    @endforeach
                </div>
                <div class="more">
                    <a href="{{route('donation')}}">المزيد</a>
                </div>
            </div>
        </div>
    </div>

    <!--contact-->
    <div class="contact">
        <div class="container">
            <div class="col-md-7">
                <div class="title">
                    <h3>اتصل بنا</h3>
                </div>
                <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                <div class="row whatsapp">
                    <a href="#">
                        <img src="{{asset('front/assets/imgs/whats.png')}}">
                        <p dir="ltr">+002  1215454551</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--app-->
    <div class="app">
        <div class="container">
            <div class="row">
                <div class="info col-md-6">
                    <h3>تطبيق بنك الدم</h3>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                    </p>
                    <div class="download">
                        <h4>متوفر على</h4>
                        <div class="row stores">
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{asset('front/assets/imgs/google.png')}}">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{asset('front/assets/imgs/ios.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="screens col-md-6">
                    <img src="{{asset('front/assets/imgs/App.png')}}">
                </div>
            </div>
        </div>
    </div>

    @push('script')



        <script>
            function toggleFavourite(heart)
            {
                var post_id=heart.id;
                $.ajax({
                    url:{{url(route('toggleFavourite'))}},
                    type:"post",
                    data:{_token:"{{csrf_token()}}",post_id:post_id}
                    success:function (data){
                        console.log(data)

                        var currentClass=$(heart).attr('class');
                        if (currentClass.includes('first'))
                        {
                            $(heart).removeClass('first-heart').addClass('second-heart');
                        }else
                        {
                            $(heart).removeClass('second-heart').addClass('first-heart');
                        }

                    },


                });


            }
        </script>

    @endpush



@endsection
