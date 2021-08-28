@extends('layouts.dashboard')

@section('title',trans('title.Attendance') )

@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('attendance.Attendance') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('attendance.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('attendance.Attendance') }}</li>
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


                        <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{trans('attendance.Date') }} : {{ date('Y-m-d') }}</h5>
                        <form method="post" action="{{ route('admin.attendance.store') }}">

                            @csrf
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th class="alert-success">#</th>
                                    <th>{{trans('attendance.Student_Name') }} </th>
                                    <th>{{trans('attendance.Email') }} </th>

                                    <th>{{trans('attendance.Grade') }} </th>
                                    <th>{{trans('attendance.Class_Room') }} </th>
                                    <th>{{trans('attendance.Section') }} </th>

                                    <th>{{trans('attendance.Actions') }} </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>

                                        <td>{{$student->grades->name}}</td>
                                        <td>{{$student->classes->name_class}}</td>
                                        <td>{{$student->sections->name}}</td>
                                        <td>

                                            @if(isset($student->attendance()->where('attendence_date',date('Y-m-d'))->first()->student_id))

                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendences[{{ $student->id }}]" disabled
                                                           {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                                                           class="leading-tight" type="radio" value="presence">
                                                    <span class="text-success">{{trans('attendance.Presence') }}</span>
                                                </label>

                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendences[{{ $student->id }}]" disabled
                                                           {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                                                           class="leading-tight" type="radio" value="absent">
                                                    <span class="text-danger">{{trans('attendance.Absence') }}</span>
                                                </label>

                                            @else

                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                                           value="presence">
                                                    <span class="text-success">{{trans('attendance.Presence') }}</span>
                                                </label>

                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                                           value="absent">
                                                    <span class="text-danger">{{trans('attendance.Absence') }}</span>
                                                </label>

                                            @endif

                                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                            <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                            <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <P>
                                <button class="btn btn-success" type="submit">{{trans('attendance.Save') }}</button>
                            </P>
                        </form><br>
                        <!-- row closed -->

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
