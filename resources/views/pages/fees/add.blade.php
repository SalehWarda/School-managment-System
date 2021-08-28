@extends('layouts.dashboard')

@section('title',trans('title.Students'))

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">إضافة رسوم جديدة</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('students.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">إضافة رسوم جديدة</li>
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

                        <form method="post" action="{{route('admin.fees.store')}}" autocomplete="off">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputEmail4">الاسم باللغة العربية</label>
                                    <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">

                                    @error('title_ar')
                                       <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputEmail4">الاسم باللغة الانجليزية</label>
                                    <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">

                                    @error('title_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="form-group col">
                                    <label for="inputEmail4">المبلغ</label>
                                    <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">

                                    @error('amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group col">
                                    <label for="inputState">المرحلة الدراسية</label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('grade_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputZip">الصف الدراسي</label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">

                                    </select>

                                    @error('classroom_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputZip">السنة الدراسية</label>
                                    <select class="custom-select mr-sm-2" name="year">
                                        <option selected disabled>Choose...</option>
                                        @php
                                            $current_year = date("Y")
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>

                                    @error('year')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">نوع الرسوم</label>
                                <select class="custom-select mr-sm-2" name="fee_type">
                                    <option value="1">رسوم دراسية</option>
                                    <option value="2">رسوم باص</option>
                                </select>

                                @error('fee_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">ملاحظات</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">تاكيد</button>

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





@endsection
