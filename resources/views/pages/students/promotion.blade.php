@extends('layouts.dashboard')

@section('title',trans('title.Students'))

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('students.Students_Promotion')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('students.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('students.Students_Promotion')}}</li>
                </ol>
            </div>
        </div>
    </div>

    @include('includes.alerts.alert')
    <h6 style="color: red;font-family: Cairo">{{trans('students.Old_School_Stage') }}</h6><br>

    <form method="post" action="{{route('admin.promotion.store')}}">
        @csrf
        <div class="form-row">
            <div class="form-group col">
                <label for="inputState">{{trans('students.Grade')}}</label>
                <select class="custom-select mr-sm-2" name="grade_id" required>
                    <option selected disabled>{{trans('students.Choose')}}...</option>
                    @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col">
                <label for="Classroom_id">{{trans('students.Class_Room')}} : <span
                        class="text-danger">*</span></label>
                <select class="custom-select mr-sm-2" name="classroom_id" required>

                </select>
            </div>

            <div class="form-group col">
                <label for="section_id">{{trans('students.Section')}} : </label>
                <select class="custom-select mr-sm-2" name="section_id" required>

                </select>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="academic_year">{{trans('students.Academic_Year') }} : <span
                            class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2" name="academic_year">
                        <option selected disabled>{{trans('students.Choose') }}...</option>
                        @php
                            $current_year = date("Y");
                        @endphp
                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                            <option value="{{ $year}}">{{ $year }}</option>
                        @endfor
                    </select>
                    @error('academic_year')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <br><h6 style="color: red;font-family: Cairo">{{trans('students.New_School_Stage') }}</h6><br>

        <div class="form-row">
            <div class="form-group col">
                <label for="inputState">{{trans('students.Grade')}}</label>
                <select class="custom-select mr-sm-2" name="grade_id_new">
                    <option selected disabled>{{trans('students.Choose')}}...</option>
                    @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col">
                <label for="Classroom_id">{{trans('students.Class_Room')}}: <span
                        class="text-danger">*</span></label>
                <select class="custom-select mr-sm-2" name="classroom_id_new">

                </select>
            </div>
            <div class="form-group col">
                <label for="section_id">:{{trans('students.Section')}} </label>
                <select class="custom-select mr-sm-2" name="section_id_new">

                </select>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="academic_year">{{trans('students.Academic_Year') }} : <span
                            class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2" name="academic_year_new">
                        <option selected disabled>{{trans('students.Choose') }}...</option>
                        @php
                            $current_year = date("Y");
                        @endphp
                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                            <option value="{{ $year}}">{{ $year }}</option>
                        @endfor
                    </select>
                    @error('academic_year_new')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{trans('students.Save')}}</button>
    </form>

    <br>
    <br>
    <br>





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

                            $('select[name="classroom_id"]').append('<option selected disabled >Choose...</option>');
                            $.each(data, function (key, value) {
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


                            $('select[name="section_id"]').append('<option selected disabled >Choose...</option>');
                            $.each(data, function (key, value) {
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






    <script>
        $(document).ready(function () {
            $('select[name="grade_id_new"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/students/classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id_new"]').empty();

                            $('select[name="classroom_id_new"]').append('<option selected disabled >Choose...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
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
            $('select[name="classroom_id_new"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/students/sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id_new"]').empty();


                            $('select[name="section_id_new"]').append('<option selected disabled >Choose...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
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
