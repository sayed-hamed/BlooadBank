@extends('admin.empty')

@section('css')

    @toastr_css
@endsection

@section('title')
    Clients
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Clients</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                    <li class="breadcrumb-item active">Clients</li>
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


                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Status</th>
                                <th>Date of birth</th>
                                <th>Last donation date</th>
                                <th>Blood Type</th>
                                <th>Processes</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=0; ?>
                            @foreach($clients as $client)
                                <tr>
                                    <td><?php echo ++$i ?></td>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>
                                        @if ($client->status == 1)

                                                    <a href="{{route('changeStatus',$client->id)}}" class="btn btn-primary">Active</a>


                                            @else
                                            <a href="{{route('changeStatus',$client->id)}}" class="btn btn-danger">NOT ACTIVE</a>

                                        @endif
                                    </td>
                                    <td>{{$client->d_o_b}}</td>
                                    <td>{{$client->last_donation_date}}</td>
                                    <td> {{$client->ClientBloodType->name}}
{{--@foreach($client->bloodType as $CBT)--}}
{{--                                        <li style="list-style-type: none;">{{$CBT->name}}</li>--}}
{{--                                         @endforeach--}}
                                    </td>
                                    <td>
                                        <a class="btn btn-danger d-inline-block" data-toggle="modal" data-target="#delete{{$client->id}}"><i class="fa fa-trash" style="color: #ffffff"></i></a>

                                    </td>
                                </tr>





                                <div class="modal fade" id="delete{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Delete Client</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('client.destroy','test')}}">
                                                    @csrf
                                                    {{@method_field('Delete')}}

                                                    Are you sure??

                                                    <input type="hidden" name="id" value="{{$client->id}}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Delete</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
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

