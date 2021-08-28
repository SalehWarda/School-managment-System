@extends('layouts.dashboard')

@section('title',trans('title.Students'))

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">الطلاب المتخرجين</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('students.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">الطلاب المتخرجين</li>
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


                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>

                                <th>{{trans('students.Student_Name') }} </th>
                                <th>{{trans('students.Email') }} </th>

                                <th>{{trans('students.Grade') }} </th>
                                <th>{{trans('students.Class_Room') }} </th>
                                <th>{{trans('students.Section') }} </th>

                                <th>{{trans('students.Actions') }} </th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($students as $student)

                                <tr>


                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>

                                    <td>{{$student->grades->name}}</td>
                                    <td>{{$student->classes->name_class}}</td>
                                    <td>{{$student->sections->name}}</td>

                                    <td>
                                        <button  data-toggle="modal" data-target="#returnStudent{{ $student->id }}"  class="btn btn-success " >إرجاع الطالب</button>
                                        <button  data-toggle="modal" data-target="#deleteStudent{{ $student->id }}" class="btn btn-danger " >حذف الطالب</button>

                                    </td>
                                </tr>

                                {{--return Modal graduates --}}
                                <div class="modal fade" id="returnStudent{{ $student->id }}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>إرجاع الطالب</h4>

                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="form" action="{{ route('admin.graduate.return') }}"
                                                      method="post">
                                                    @csrf

                                                    <input type="hidden" name="student_id" value="{{$student->id}}" id="id">

                                                    <h5>هل أنت متأكد من عملية إرجاع الطالب</h5>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('students.Close')}}
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">إرجاع</button>

                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                {{--Delete Modal graduates --}}
                                <div class="modal fade" id="deleteStudent{{ $student->id }}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>حذف الطالب</h4>

                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="form" action="{{ route('admin.graduate.delete') }}"
                                                      method="post">
                                                    @csrf

                                                    <input type="hidden" name="student_id" value="{{$student->id}}" id="id">

                                                    <h5>هل أنت متأكد من عملية حذف الطالب</h5>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('students.Close')}}
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">حذف</button>

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

