@extends('layouts.dashboard')

@section('title',trans('title.Quizzes'))

@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('quizzes.Add_newQuizze') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('quizzes.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('quizzes.Add_newQuizze') }}</li>
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


                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <br>
                                <form action="{{route('admin.quizzes.store')}}" method="post" autocomplete="off">
                                    @csrf

                                    <div class="form-row">

                                        <div class="col">
                                            <label for="title">{{trans('quizzes.Quizze_Arabic') }}</label>
                                            <input type="text" name="name_ar" class="form-control">
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('quizzes.Quizze_English') }}</label>
                                            <input type="text" name="name_en" class="form-control">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-row">

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Grade_id">{{trans('quizzes.Subject') }} : <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="subject_id">
                                                    <option selected disabled>{{trans('quizzes.Choose') }}...</option>
                                                    @foreach($subjects as $subject)
                                                        <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="teacher_id">{{trans('quizzes.Teacher_Name') }} : <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" id="teacher_id" name="teacher_id">
                                                    <option selected disabled>{{trans('quizzes.Choose') }}...</option>
                                                    @foreach($teachers as $teacher)
                                                        <option  value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="grade_id">{{trans('quizzes.Grade') }} : <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="grade_id">
                                                    <option selected disabled>{{trans('quizzes.Choose') }}...</option>
                                                    @foreach($grades as $grade)
                                                        <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Classroom_id">{{trans('quizzes.Class_Room') }} : <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="classroom_id">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="section_id">{{trans('quizzes.Section') }} : </label>
                                                <select class="custom-select mr-sm-2" name="section_id">

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('quizzes.Save') }}</button>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/students/classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option selected disabled >Choose...</option>');
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/students/sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option selected disabled >Choose...</option>');
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
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
