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
                                <div class="col-xl-12 mb-30">
                                    <div class="card card-statistics h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">إضافة سؤال جديد </h5>
                                            <form action="{{route('admin.questions.store')}}" method="post">

                                                @csrf

                                                <div class="repeater-add">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail5">السؤال</label>
                                                            <input type="text" class="form-control" name="title" id="inputEmail5" placeholder="أكتب سؤال">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputPassword5">الإجابة الصحيحة</label>
                                                            <input type="text" class="form-control" name="right_answer" id="inputPassword5" placeholder="الإجابة الصحيحة">
                                                        </div>
                                                    </div>
                                                    <div data-repeater-list="answersQ">
                                                        <div data-repeater-item>
                                                            <div class="row mb-20">
                                                                <div class="col-md-6">
                                                                    <label for="inputAddress5">ضع إجابة</label>
                                                                    <input type="text" class="form-control" name="answers" id="inputAddress5" placeholder="">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <input class="btn btn-danger btn-block mt-30" data-repeater-delete type="button" value="Delete"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group clearfix mb-20">
                                                        <input class="button" data-repeater-create type="button" value="إضافة إجابة جديدة"/>
                                                    </div>
                                                    <div class="form-row">


                                                            <input type="hidden" name="quizze_id" value="{{$quizzes->id}}">

                                                        <div class="form-group col-md-6">
                                                            <label for="inputZip5">العلامة</label>
                                                            <input type="text" name="score" class="form-control" id="inputZip5">
                                                        </div>
                                                    </div>

                                                </div>


                                                <button type="submit" class="btn btn-success">حفظ البيانات</button>
                                            </form>
                                        </div>
                                    </div>
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
