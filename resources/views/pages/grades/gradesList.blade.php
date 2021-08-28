@extends('layouts.dashboard')

@section('title',trans('title.Grades') )

@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('grade.School_Grade')}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('grade.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('grade.School_Grade')}}</li>
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
                            <button type="button" class="button icon x-small left" data-toggle="modal"
                                    data-target="#addGrade"
                                    href="#"> {{trans('grade.Add_Grade')}} <i class="fa fa-plus"></i></button>
                        </div>

                    </div>


                    <div class="table-responsive mt-15">
                        <table id="datatable" class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark table-success">
                                <th>#</th>
                                <th>{{trans('grade.Name')}}</th>
                                <th>{{trans('grade.Note')}}</th>
                                <th>{{trans('grade.Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($grades as $grade)
                                <?php $i++ ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$grade->name}}</td>
                                    <td>{{$grade->note}}</td>

                                    <td>
                                        <a class="pr-2" data-toggle="modal" data-target="#editGrade{{$grade->id}}"
                                           href="#"> <i class="fa fa-pencil"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteGrade{{$grade->id}}"> <i
                                                class="fa fa-trash-o text-danger"></i></a>
                                    </td>

                                </tr>


                                {{--edit Modal Grade--}}
                                <div class="modal fade" id="editGrade{{$grade->id}}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>{{trans('grade.Edit_Grade')}}</h4>

                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card card-statistics mb-30">
                                                    <div class="card-body">

                                                        <form class="form" action="{{route('admin.grades.update')}}"
                                                              method="post">
                                                            @csrf

                                                            <input type="hidden" name="id" value="{{$grade->id}}"
                                                                   id="id">
                                                            <div class="row">
                                                                <div class=" col-md-6 form-group">
                                                                    <label
                                                                        for="name">: {{trans('grade.Name_English')}}</label>
                                                                    <input type="text" class="form-control" name="name"
                                                                           id="name"
                                                                           value="{{$grade->getTranslation('name','en')}}">
                                                                </div>

                                                                <div class="col-md-6 form-group">
                                                                    <label
                                                                        for="name_ar">: {{trans('grade.Name_Arabic')}}</label>
                                                                    <input type="text" class="form-control"
                                                                           name="name_ar" id="name_ar"
                                                                           value="{{$grade->getTranslation('name','ar')}}">
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 form-group">
                                                                    <label for="note">: {{trans('grade.Note')}}</label>
                                                                    <textarea class="form-control" name="note" id="note"
                                                                              rows="3">{{old('note',$grade->note)}}</textarea>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('grade.Close')}}
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-success">{{trans('grade.Save_Changes')}}</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{--delete Modal Grade--}}
                                <div class="modal fade" id="deleteGrade{{$grade->id}}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>{{trans('grade.Delete_Grade')}}</h4>

                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="form" action="{{route('admin.grades.delete')}}"
                                                      method="post">
                                                    @csrf

                                                    <input type="hidden" name="id" value="{{$grade->id}}" id="id">

                                                    <h5>{{trans('grade.Delete')}}</h5>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('grade.Close')}}
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{trans('grade.Delete_Action')}}</button>

                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                    {{--Add Modal Grade--}}
                    <div class="modal fade" id="addGrade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title">
                                        <div class="mb-30">

                                            <h4>{{trans('grade.Add_Grade')}}</h4>

                                        </div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card card-statistics mb-30">
                                        <div class="card-body">

                                            <form class="form" action="{{route('admin.grades.store')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class=" col-md-6 form-group">
                                                        <label for="name">: {{trans('grade.Name_English')}}</label>
                                                        <input type="text" class="form-control" name="name" id="name">
                                                    </div>

                                                    <div class="col-md-6 form-group">
                                                        <label for="name_ar">: {{trans('grade.Name_Arabic')}}</label>
                                                        <input type="text" class="form-control" name="name_ar"
                                                               id="name_ar">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="note">: {{trans('grade.Note')}}</label>
                                                        <textarea class="form-control" name="note" id="note"
                                                                  rows="3"></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('grade.Close')}}
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-success ">{{trans('grade.Add')}} <i
                                                            class="fa fa-plus"></i></button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




@endsection
