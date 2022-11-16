@extends('admin.empty')

@section('css')

    @toastr_css
@endsection

@section('title')
    Donation Requests
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Donation Requests</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                    <li class="breadcrumb-item active">Donation Requests</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">

                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ $donation->name }}</td>
                                            <th scope="row">phone</th>
                                            <td>{{$donation->phone}}</td>
                                            <th scope="row">Num_bags</th>
                                            <td>{{$donation->num_bags}}</td>
                                            <th scope="row">Hospital address</th>
                                            <td>{{$donation->hospital_address}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Age</th>
                                            <td>{{ $donation->age}}</td>
                                            <th scope="row">Details</th>
                                            <td>{{$donation->details}}</td>
                                            <th scope="row">Blood Type</th>
                                            <td>{{$donation->BloodType->name}}</td>

                                        </tr>


                                        </tbody>
                                    </table>
                                </div>

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

