@extends('layouts.dashboard')

@section('title',trans('title.Students'))

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">تعديل الفاتورة </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('students.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">تعديل الفاتورة </li>
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


                        <form action="{{route('admin.fee_invoice.update')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputEmail4">اسم الطالب</label>
                                    <input type="text" value="{{$feesInvoices->students->name}}" readonly name="title_ar" class="form-control">
                                    <input type="hidden" value="{{$feesInvoices->id}}" name="id" class="form-control">
                                </div>


                                <div class="form-group col">
                                    <label for="inputEmail4">المبلغ</label>
                                    <input type="number" value="{{$feesInvoices->amount}}" name="amount" class="form-control">
                                </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group col">
                                    <label for="inputZip">نوع الرسوم</label>
                                    <select class="custom-select mr-sm-2" name="fee_id">
                                        @foreach($fees as $fee)
                                            <option value="{{$fee->id}}" {{$fee->id == $feesInvoices->fee_id ? 'selected':"" }}>{{$fee->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="inputAddress">ملاحظات</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$feesInvoices->description}}</textarea>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">تاكيد</button>

                        </form>


                </div>
            </div>
        </div>
    </div>





@endsection



