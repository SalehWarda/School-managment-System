@extends('layouts.dashboard')

@section('title',trans('title.Students') )

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('students.Edit_Student') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('students.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('students.Edit_Student') }}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    @include('includes.alerts.alert')


                    <form method="post" action="{{route('admin.students.update')}}" autocomplete="off">
                        @csrf

                        <input type="hidden" name="id" value="{{ $students->id }}" >
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students.Personal_Info') }}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students.Student_Name_Arabic') }} : <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $students->getTranslation('name','ar') }}" name="name_ar" class="form-control">
                                    @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students.Student_Name_English') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{ $students->getTranslation('name','en') }}" name="name_en" type="text">
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students.Email') }} : </label>
                                    <input type="email" value="{{ $students->email }}" name="email" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students.Password') }} :</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender"> {{trans('students.Gender') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>{{trans('students.Choose') }}...</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}" @if($students->gender_id == $gender->id ) selected @endif>{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('students.Student_Nationality') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitles_id">
                                        <option selected disabled>{{trans('students.Choose') }}...</option>
                                        @foreach($nationals as $national)
                                            <option value="{{ $national->id }}" @if($students->nationalitles_id == $national->id ) selected @endif>{{ $national->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nationalitles_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id"> {{trans('students.Student_Blood_Type') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="blood_id">
                                        <option selected disabled>{{trans('students.Choose') }}...</option>
                                        @foreach($bloods as $blood)
                                            <option value="{{ $blood->id }}"  @if($students->blood_id == $blood->id ) selected @endif>{{ $blood->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blood_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('students.Birth_Date') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="datepicker-action" value="{{ $students->birth_date }}" name="birth_date"
                                           data-date-format="yyyy-mm-dd">
                                    @error('birth_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students.Student_Info') }}</h6><br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('students.Grade') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{trans('students.Choose') }}...</option>
                                        @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}"  @if($students->grade_id == $grade->id ) selected @endif>{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('grade_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('students.Class_Room') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">

                                        <option value="{{ $students->classroom_id }}" >{{ $students->classes->name_class }}</option>


                                    </select>
                                    @error('classroom_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id"> {{trans('students.Section') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="section_id">

                                        <option value="{{ $students->section_id }}" >{{ $students->sections->name }}</option>

                                    </select>
                                    @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('students.The_Father') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>{{trans('students.Choose') }}...</option>
                                        @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}" @if($students->parent_id == $parent->id ) selected @endif>{{ $parent->father_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
                                            <option value="{{ $year}}" @if($students->academic_year == $year ) selected @endif>{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('academic_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('students.Save_Changes') }}
                        </button>
                    </form>


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
