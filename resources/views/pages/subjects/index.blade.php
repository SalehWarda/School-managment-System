@extends('layouts.dashboard')

@section('title',trans('title.Subjects')  )

@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('subjects.Subjects') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('subjects.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('subjects.Subjects') }}</li>
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


                    <a href="{{route('admin.subjects.create')}}" class="btn btn-success btn-sm" role="button"
                       aria-pressed="true">{{trans('subjects.Add_newSubject') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('subjects.Subject_Name') }}</th>
                                <th>{{trans('subjects.Grade') }}</th>
                                <th>{{trans('subjects.Class_Room') }}</th>
                                <th>{{trans('subjects.Teacher_Name') }}</th>
                                <th>{{trans('subjects.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->grade->name}}</td>
                                    <td>{{$subject->classroom->name_class}}</td>
                                    <td>{{$subject->teacher->name}}</td>
                                    <td>
                                        <a href="{{route('admin.subjects.edit',$subject->id)}}"
                                           class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_subject{{ $subject->id }}" ><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                            @include('pages.subjects.delete')


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
