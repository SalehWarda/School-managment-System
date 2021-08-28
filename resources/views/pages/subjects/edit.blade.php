@extends('layouts.dashboard')

@section('title',trans('title.Subjects') )

@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('subjects.Add_newSubject') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('subjects.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('subjects.Add_newSubject') }}</li>
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
                            <form action="{{route('admin.subjects.update')}}" method="post" autocomplete="off">
                                @csrf

                                <input type="hidden" name="subject_id" value="{{$subject->id}}" >

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('subjects.Subject_Arabic') }}</label>
                                        <input type="text" name="name_ar" value="{{ $subject->getTranslation('name','ar') }}" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans('subjects.Subject_English') }}</label>
                                        <input type="text" name="name_en" value="{{ $subject->getTranslation('name','en') }}" class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">{{trans('subjects.Grade') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="grade_id">
                                            <option selected disabled>Choose...</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}" @if($subject->grade_id == $grade->id) selected @endif>{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState">{{trans('subjects.Class_Room') }}</label>
                                        <select name="classroom_id" class="custom-select">

                                            <option
                                                value="{{ $subject->classroom->id }}">{{ $subject->classroom->name_class }}
                                            </option>

                                        </select>
                                    </div>


                                    <div class="form-group col">
                                        <label for="inputState">{{trans('subjects.Teacher_Name') }}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                            <option selected disabled>{{trans('subjects.Choose') }}...</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}" {{ $subject->teacher_id == $teacher->id ? 'selected' : ''}}>{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('subjects.Save_Changes') }}</button>
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
                        url: "{{ URL::to('admin/Sections/classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
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

@endsection
