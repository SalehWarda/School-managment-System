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

    @include('includes.alerts.alert')


    <form method="post" action="{{route('admin.graduate.Info')}}">

        @csrf


        <div class="form-row">
            <div class="form-group col">
                <label for="inputState">{{trans('students.Grade')}}</label>
                <select class="custom-select mr-sm-2" name="grade_id" >
                    <option selected disabled>{{trans('students.Choose')}}...</option>
                    @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col">
                <label for="Classroom_id">{{trans('students.Class_Room')}} : <span
                        class="text-danger">*</span></label>
                <select class="custom-select mr-sm-2" name="classroom_id" >

                </select>
            </div>

            <div class="form-group col">
                <label for="section_id">{{trans('students.Section')}} : </label>
                <select class="custom-select mr-sm-2" name="section_id" >

                </select>
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








@endsection
