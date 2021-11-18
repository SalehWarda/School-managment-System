@extends('layouts.dashboard')

@section('title',trans('title.Quizzes') )

@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('quizzes.Quizzes') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('quizzes.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('quizzes.Quizzes') }}</li>
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


                        <a href="{{route('admin.quizzes.create')}}" class="btn btn-success btn-sm" role="button"
                           aria-pressed="true">{{trans('quizzes.Add_newQuizze') }}</a><br><br>
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('quizzes.Quizze_Name') }}</th>
                                    <th>{{trans('quizzes.Teacher_Name') }}</th>
                                    <th>{{trans('quizzes.Grade') }}</th>
                                    <th>{{trans('quizzes.Class_Room') }}</th>
                                    <th>{{trans('quizzes.Section') }}</th>
                                    <th>{{trans('quizzes.Actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quizzes as $quizze)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{$quizze->name}}</td>
                                        <td>{{$quizze->teacher->name}}</td>
                                        <td>{{$quizze->grade->name}}</td>
                                        <td>{{$quizze->classroom->name_class}}</td>
                                        <td>{{$quizze->section->name}}</td>
                                        <td>


                                            <div class="dropdown show">
                                                <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    العمليات
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{route('admin.questions',$quizze->id)}}"><i style="color: #ffc107" class="fa fa-eye "></i>&nbsp;  عرض الأسئلة</a>
                                                    <a class="dropdown-item" href="{{route('admin.quizzes.edit',$quizze->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل الأختبار</a>
                                                    <a class="dropdown-item" data-target="#delete_exam{{ $quizze->id }}" data-toggle="modal" href="{{route('admin.quizzes.edit',$quizze->id)}}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف الأختبار  </a>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_exam{{$quizze->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('admin.quizzes.delete')}}" method="post">
                                               @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title" id="exampleModalLabel">{{trans('quizzes.Delete_Quizze') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> {{trans('quizzes.Delete') }} : {{$quizze->name}}</p>
                                                        <input type="hidden" name="id" value="{{$quizze->id}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{trans('quizzes.Close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{trans('quizzes.Delete_Action') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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

@section('script')

    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/Sections/classes') }}/" + Grade_id,
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

@endsection
