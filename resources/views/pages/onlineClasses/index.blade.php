@extends('layouts.dashboard')

@section('title','Online Classes' )

@section('content')


    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('admin.onlineClasses.create')}}" class="btn btn-success " role="button"
                                   aria-pressed="true">اضافة حصة اونلاين جديدة</a>
                                <a class="btn btn-warning" href="{{route('admin.onlineClasses.indirectCreate')}}">اضافة حصة اوفلاين جديدة</a>


                                <br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>المرحلة</th>
                                            <th>الصف</th>
                                            <th>القسم</th>
                                            <th>المعلم</th>
                                            <th>عنوان الحصة</th>
                                            <th>تاريخ البداية</th>
                                            <th>وقت الحصة</th>
                                            <th>رابط الحصة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_Class as $online_class)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$online_class->grade->name}}</td>
                                                <td>{{ $online_class->classroom->name_class }}</td>
                                                <td>{{$online_class->section->name}}</td>
                                                <td>{{$online_class->user_id}}</td>
                                                <td>{{$online_class->topic}}</td>
                                                <td>{{$online_class->start_at}}</td>
                                                <td>{{$online_class->duration}}</td>
                                                <td class="text-danger"><a href="{{$online_class->join_url}}" target="_blank">انضم الان</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_class->meeting_id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.onlineClasses.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->




@endsection

