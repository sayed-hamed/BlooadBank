@extends('admin.empty')

@section('css')

    @toastr_css
@endsection

@section('title')
    Setting
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Setting</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                    <li class="breadcrumb-item active">Setting</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @include('admin.errors')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <!-- Button trigger modal -->

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Noti_Sett_text</th>
                                <th>About App</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>FB_link</th>
                                <th>Inst_link</th>
                                <th>TW_link</th>
                                <th>YT_link</th>
                                <th>Processes</th>

                            </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>{{$setting->id}}</td>
                                    <td>{{$setting->notification_setting_text}}</td>
                                    <td>{{$setting->about_app}}</td>
                                    <td>{{$setting->phone}}</td>
                                    <td>{{$setting->email}}</td>
                                    <td>{{$setting->fb_link}}</td>
                                    <td>{{$setting->inst_link}}</td>
                                    <td>{{$setting->tw_link}}</td>
                                    <td>{{$setting->yt_link}}</td>
                                    <td>
                                        <a class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#edit{{$setting->id}}"><i class="fa fa-edit" style="color: #ffffff"></i></a>
                                    </td>
                                </tr>



                                <div class="modal fade" id="edit{{$setting->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Update Settings</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('setting.update','test')}}">
                                                    @csrf
                                                    {{method_field('PUT')}}

                                                    <input type="hidden" value="{{$setting->id}}" name="id">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Notification_setting_text</label>
                                                        <input type="text" value="{{$setting->notification_setting_text}}" name="notification_setting_text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">About_app</label>
                                                        <input type="text" value="{{$setting->about_app}}" name="about_app" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Phone</label>
                                                        <input type="text" value="{{$setting->phone}}" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">email</label>
                                                        <input type="text" value="{{$setting->email}}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">fb_link</label>
                                                        <input type="text" value="{{$setting->fb_link}}" name="fb_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">inst_link</label>
                                                        <input type="text" value="{{$setting->inst_link}}" name="inst_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">tw_link</label>
                                                        <input type="text" value="{{$setting->tw_link}}" name="tw_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">yt_link</label>
                                                        <input type="text" value="{{$setting->yt_link}}" name="yt_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>







                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->

@endsection
@section('js')

    @toastr_js
    @toastr_render

@endsection

