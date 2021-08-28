@extends('layouts.dashboard')

@section('title',trans('title.Students'))

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">سند قبض</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('students.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">سند قبض</li>
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


                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>المبلغ</th>
                                    <th>البيان</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($receipt_students as $receipt_student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$receipt_student->students->name}}</td>
                                        <td>{{ number_format($receipt_student->debit, 2) }}</td>
                                        <td>{{$receipt_student->description}}</td>
                                        <td>
                                            <a href="{{route('admin.receipts.edit',$receipt_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$receipt_student->id}}" ><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @include('pages.Receipt.delete')
                                @endforeach
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>





@endsection



