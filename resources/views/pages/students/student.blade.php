@extends('layouts.dashboard')

@section('title',trans('title.Students'))

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('students.Students') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('students.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('students.Students') }}</li>
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

                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <a class="btn btn-success icon left"

                               href="{{route('admin.students.create')}}">{{trans('students.Add_Student') }} <i class="fa fa-plus"></i></a>
                        </div>

                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>

                                <th>{{trans('students.Student_Name') }} </th>
                                <th>{{trans('students.Email') }} </th>

                                <th>{{trans('students.Grade') }} </th>
                                <th>{{trans('students.Class_Room') }} </th>
                                <th>{{trans('students.Section') }} </th>

                                <th>{{trans('students.Actions') }} </th>
                            </tr>
                            </thead>
                            <tbody>


                           @foreach($students as $student)

                            <tr>


                                   <td>{{$loop->index+1}}</td>
                                   <td>{{$student->name}}</td>
                                   <td>{{$student->email}}</td>

                                   <td>{{$student->grades->name}}</td>
                                   <td>{{$student->classes->name_class}}</td>
                                   <td>{{$student->sections->name}}</td>



                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            العمليات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('admin.students.show',$student->id) }}"><i style="color: #ffc107" class="fa fa-eye "></i>&nbsp;  عرض بيانات الطالب</a>
                                            <a class="dropdown-item" href="{{ route('admin.students.edit',$student->id) }}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الطالب</a>
                                            <a class="dropdown-item" href="{{route('admin.feeInvoice.create',$student->id)}}"><i style="color: #0000cc" class="fa fa-file-archive-o"></i>&nbsp;اضافة فاتورة رسوم&nbsp;</a>
                                            <a class="dropdown-item" href="{{route('admin.receipts.create',$student->id)}}"><i style="color: #9dc8e2" class="fa fa-money"></i> إنشاء سند قبض </a>
                                            <a class="dropdown-item" href="{{route('admin.processingFee.create',$student->id)}}"><i style="color: #9dc8e2" class="fa fa-money"></i> إستبعاد رسوم الطالب </a>
                                            <a class="dropdown-item" href="{{route('admin.payment.create',$student->id)}}"><i style="color: #9dc8e2" class="fa fa-money"></i> إنشاء سند صرف </a>
                                            <a class="dropdown-item" data-target="#deleteStudent{{ $student->id }}" data-toggle="modal" href="#deleteStudent{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف بيانات الطالب</a>
                                            <a class="dropdown-item" data-target="#graduateStudent{{ $student->id }}" data-toggle="modal" href="#graduateStudent{{ $student->id }}"><i style="color: red" class="fa fa-graduation-cap"></i>&nbsp; تخرج الطالب</a>
                                        </div>
                                    </div>
                                </td>
                               </tr>

                              {{--delete Modal student --}}
                               <div class="modal fade" id="deleteStudent{{ $student->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <div class="modal-title">
                                                   <div class="mb-30">

                                                       <h4>{{trans('students.Delete_Student') }}</h4>

                                                   </div>
                                               </div>
                                               <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">

                                               <form class="form" action="{{ route('admin.students.delete') }}"
                                                     method="post">
                                                   @csrf

                                                   <input type="hidden" name="id" value="{{$student->id}}" id="id">

                                                   <h5>{{trans('students.Delete')}}</h5>


                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary"
                                                               data-dismiss="modal">{{trans('students.Close')}}
                                                       </button>
                                                       <button type="submit"
                                                               class="btn btn-danger">{{trans('students.Delete_Action')}}</button>

                                                   </div>
                                               </form>

                                           </div>

                                       </div>
                                   </div>
                               </div>


                            {{--graduate Modal student --}}
                               <div class="modal fade" id="graduateStudent{{ $student->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <div class="modal-title">
                                                   <div class="mb-30">

                                                       <h4>تخرج الطالب</h4>

                                                   </div>
                                               </div>
                                               <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">

                                               <form class="form" action="{{route('admin.student.graduate')}}"
                                                     method="post">
                                                   @csrf

                                                   <input type="hidden" name="student_id" value="{{$student->id}}" id="id">

                                                   <h5>هل أنت متأكد من تخرج الطالب؟</h5>


                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary"
                                                               data-dismiss="modal">{{trans('students.Close')}}
                                                       </button>
                                                       <button type="submit"
                                                               class="btn btn-danger">تأكيد</button>

                                                   </div>
                                               </form>

                                           </div>

                                       </div>
                                   </div>
                               </div>
                           @endforeach



                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>





@endsection

