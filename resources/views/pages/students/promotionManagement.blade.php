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
                                                   class="default-color">{{trans('teachers.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('students.Students_Promotion')}}</li>
                </ol>
            </div>
        </div>
    </div>






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

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block">
                                        <a class="btn btn-danger icon left" data-toggle="modal"
                                           data-target="#backPromotion"

                                           href="">{{trans('students.Undo_All_Upgrade')}}</a>
                                    </div>

                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('students.Student_Name')}}</th>
                                            <th class="alert-danger">{{trans('students.Previous_School_Stage')}}</th>
                                            <th class="alert-danger">{{trans('students.Previous_Class')}}</th>
                                            <th class="alert-danger">{{trans('students.Previous_Section')}}</th>
                                            <th class="alert-danger">{{trans('students.Previous_Academic_Year')}}</th>

                                            <th class="alert-success">{{trans('students.Neww_School_Stage')}}</th>
                                            <th class="alert-success">{{trans('students.Neww_Class')}}</th>
                                            <th class="alert-success">{{trans('students.Neww_Section')}}</th>
                                            <th class="alert-success">{{trans('students.Neww_Academic_Year')}}</th>

                                            <th>{{trans('students.Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($promotions as $promotion)

                                            <tr>


                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$promotion->students->name}}</td>
                                                <td>{{$promotion->fgrades->name}}</td>

                                                <td>{{$promotion->fclasses->name_class}}</td>
                                                <td>{{$promotion->fsections->name}}</td>
                                                <td>{{$promotion->from_academic_year}}</td>
                                                <td>{{$promotion->tgrades->name}}</td>

                                                <td>{{$promotion->tclasses->name_class}}</td>
                                                <td>{{$promotion->tsections->name}}</td>
                                                <td>{{$promotion->to_academic_year_new}}</td>

                                                <td class="d-flex">

                                                    <button type="button" class="btn btn-outline-danger "
                                                            data-toggle="modal"
                                                            data-target="#backPromotion_one{{$promotion->id}}">{{trans('students.Return_The_Student')}}
                                                    </button>
                                                    <button type="button" class="btn btn-outline-success ml-1"
                                                            data-toggle="modal"
                                                            data-target="#graduateStudent{{ $promotion->id }}">{{trans('students.Student_Graduation')}}
                                                    </button>
                                                </td>
                                            </tr>




                                            {{--backPromotion Modal  --}}
                                            <div class="modal fade" id="backPromotion" tabindex="-1"
                                                 role="dialog"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="modal-title">
                                                                <div class="mb-30">

                                                                    <h4> {{trans('students.Undo_All_Upgrade')}} ! </h4>

                                                                </div>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form class="form"
                                                                  action="{{route('admin.promotion.back')}}"
                                                                  method="post">
                                                                @csrf

                                                                <input type="hidden" name="backAll_promotion" value="1">

                                                                <h5>{{trans('students.Undo_All_Upgrade_msg')}}</h5>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('students.Close')}}
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{trans('students.Yes')}}</button>

                                                                </div>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            {{--backPromotion student Modal  --}}
                                            <div class="modal fade" id="backPromotion_one{{$promotion->id}}"
                                                 tabindex="-1"
                                                 role="dialog"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="modal-title">
                                                                <div class="mb-30">

                                                                    <h4> {{trans('students.Undo_All_Upgrade')}} ! </h4>

                                                                </div>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form class="form"
                                                                  action="{{route('admin.promotion.back')}}"
                                                                  method="post">
                                                                @csrf

                                                                <input type="hidden" name="id"
                                                                       value="{{$promotion->id}}">
                                                                <h5 style="font-family: 'Cairo', sans-serif;">{{trans('students.Undo_Student_Upgrade_msg')}}
                                                                    <strong>{{$promotion->students->name}}</strong></h5>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('students.Close')}}
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{trans('students.Yes')}}</button>

                                                                </div>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            {{--graduate Modal student --}}
                                            <div class="modal fade" id="graduateStudent{{ $promotion->id }}" tabindex="-1" role="dialog"
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

                                                                <input type="hidden" name="student_id" value="{{$promotion->id}}" id="id">

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
            </div>
        </div>


    </div>





@endsection

