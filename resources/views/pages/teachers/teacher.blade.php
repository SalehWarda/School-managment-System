@extends('layouts.dashboard')

@section('title',trans('teachers.Teachers'))

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('teachers.Teachers')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('teachers.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('teachers.Teachers') }}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif

                    @include('includes.alerts.alert')

                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <a class="button icon x-small left"

                               href="{{route('admin.teachers.create')}}"> {{trans('teachers.Add_Teacher') }} <i class="fa fa-plus"></i></a>
                        </div>

                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr class="table-success">
                                <th>#</th>
                                <th>{{trans('teachers.Email') }} </th>
                                <th>{{trans('teachers.Name') }} </th>
                                <th>{{trans('teachers.Specialization') }} </th>
                                <th>{{trans('teachers.Gender') }} </th>
                                <th>{{trans('teachers.Joining_Date') }} </th>
                                <th>{{trans('teachers.Address') }} </th>
                                <th>{{trans('teachers.Actions') }} </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 0 ?>
                            @foreach($teachers as $teacher)
                                <?php $i++ ?>
                                <tr>


                                    <td>{{$i}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->specializations->name}}</td>
                                    <td>{{$teacher->genders->name}}</td>
                                    <td>{{$teacher->joining_date}}</td>
                                    <td>{{$teacher->address}}</td>
                                    <td>
                                        <a class="pr-2" href="{{route('admin.teachers.edit',$teacher->id)}}"> <i
                                                class="fa fa-pencil"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteTeacher{{$teacher->id}}"> <i
                                                class="fa fa-trash-o text-danger"></i></a>
                                    </td>
                                </tr>

                                {{--delete Modal Teacher --}}
                                <div class="modal fade" id="deleteTeacher{{$teacher->id}}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>{{trans('teachers.Delete_Teacher') }}</h4>

                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="form" action="{{route('admin.teachers.delete')}}"
                                                      method="post">
                                                    @csrf

                                                    <input type="hidden" name="id" value="{{$teacher->id}}" id="id">

                                                    <h5>{{trans('teachers.Delete')}}</h5>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('teachers.Close')}}
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{trans('teachers.Delete_Action')}}</button>

                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>





@endsection

