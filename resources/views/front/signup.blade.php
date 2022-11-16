@extends('front.master')

@section('css')

    @toastr_css
@endsection

@section('content')


    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                @include('admin.errors')
                <form method="post" action="{{route('sign')}}">
                    {{csrf_field()}}
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الإسم">

                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكترونى">

                    <input placeholder="تاريخ الميلاد" name="date" class="form-control" type="text" onfocus="(this.type='date')" id="date">
                    <div class="col">
                        <select name="blood_type" class="custom-select">
                            <!--placeholder-->
                            <option selected disabled hidden  >فصيلة الدم</option>
                            @foreach($types as $type)

                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col">
                        <select name="Govern_id" class="custom-select"
                                onchange="console.log($(this).val())">
                            <!--placeholder-->
                            <option selected disabled hidden  >المحافظة</option>
                        @foreach($govers as $gov)

                                <option value="{{$gov->id}}">{{$gov->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName"
                               class="control-label">المدينة</label>
                        <select name="Class_id" class="custom-select">
                        </select>
                    </div>

                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف">

                    <input placeholder="آخر تاريخ تبرع" name="don_date" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور">

                    <div class="create-btn">
                        <input type="submit" value="إنشاء"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection


@section('script')

    <script>
        $(document).ready(function () {
            $('select[name="Govern_id"]').on('change', function () {
                var Govern_id = $(this).val();
                if (Govern_id) {
                    $.ajax({
                        url: "{{ URL::to('/getcities') }}/" + Govern_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    @toastr_js
    @toastr_render



    {{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('select[name="governorate"]').on('change', function () {--}}
{{--                var Grade_id = $(this).val();--}}
{{--                if (Grade_id) {--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ URL::to('getcities') }}/" + Grade_id,--}}
{{--                        type: "GET",--}}
{{--                        dataType: "json",--}}
{{--                        success: function (data) {--}}
{{--                            $('select[name="city"]').empty();--}}
{{--                            $.each(data, function (key, value) {--}}
{{--                                $('select[name="city"]').append('<option value="' + key + '">' + value + '</option>');--}}
{{--                            });--}}
{{--                        },--}}
{{--                    });--}}
{{--                } else {--}}
{{--                    console.log('AJAX load did not work');--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection
