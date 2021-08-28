@extends('layouts.dashboard')

@section('title',trans('title.ClassRoom') )

@section('content')








    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('classRoom.ClassRoom_list')}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('classRoom.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('classRoom.ClassRoom_list')}}</li>
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
                                    data-target="#addClass"
                                    href="#"> {{trans('classRoom.Add_Class')}} <i class="fa fa-plus"></i></button>
                            <button id="btn_delete_all" type="button" class="button icon x-small left"

                                    href="#"> حذف الصفوف المختارة <i class="fa fa-trash-o"></i></button>
                        </div>

                    </div>
                        <br>
                        <form action="{{route('admin.classes.filter')}}" method="post">
                            @csrf
                            <div class="row">
                            <div class="col-md-2">

                                <div class="box">
                                    <select class="fancyselect" name="grade_id" onchange="this.form.submit()">
                                        <option value="" selected disabled>بحث بواسطة المرحلة</option>                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            </div>

                        </form>


                    <div class="table-responsive mt-15">
                        <table id="datatable" class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>

                                <th>#</th>
                                <th>{{trans('classRoom.Name')}}</th>
                                <th>{{trans('classRoom.Grade')}}</th>
                                <th>{{trans('classRoom.Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($details))

                                <?php  $List_Classes = $details  ?>
                            @else
                                <?php  $List_Classes = $classes  ?>
                            @endif




                            <?php $i = 0 ?>
                            @foreach($List_Classes as $class)
                                <?php $i++ ?>
                                <tr>
                                    <td><input type="checkbox"  value="{{ $class->id }}" class="box1" ></td>

                                    <td>{{$i}}</td>
                                    <td>{{$class->name_class}}</td>
                                    <td>{{$class->grades->name}}</td>

                                    <td>
                                        <a class="pr-2" data-toggle="modal" data-target="#editClass{{$class->id}}"
                                           href="#"> <i
                                                class="fa fa-pencil"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteClass{{$class->id}}"> <i
                                                class="fa fa-trash-o text-danger"></i></a>
                                    </td>

                                </tr>

                                {{--  edit Modal Grade--}}
                                <div class="modal fade" id="editClass{{$class->id}}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>{{trans('classRoom.Edit_Class')}}</h4>

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

                                                        <form class="form" action="{{route('admin.classes.update')}}"
                                                              method="post">
                                                            @csrf

                                                            <input type="hidden" name="id" value="{{$class->id}}"
                                                                   id="id">
                                                            <div class="row">
                                                                <div class=" col-md-6 form-group">
                                                                    <label
                                                                        for="name_class"> {{trans('classRoom.Name_English')}} :</label>
                                                                    <input type="text" class="form-control"
                                                                           name="name_class"
                                                                           id="name_class"
                                                                           value="{{$class->getTranslation('name_class','en')}}">
                                                                </div>

                                                                <div class="col-md-6 form-group">
                                                                    <label
                                                                        for="name_class_ar"> {{trans('classRoom.Name_Arabic')}} :</label>
                                                                    <input type="text" class="form-control"
                                                                           name="name_class_ar" id="name_class_ar"
                                                                           value="{{$class->getTranslation('name_class','ar')}}">
                                                                </div>
                                                            </div>

                                                            <div class="row ">
                                                                <div class="col-md-4">
                                                                    <label for="name_class"
                                                                           class="mr-sm-2">{{trans('classRoom.Name_Grade')}} :
                                                                    </label>

                                                                    <div class="box">
                                                                        <select class="fancyselect" name="grade_id">
                                                                            @foreach ($grades as $grade)
                                                                                <option
                                                                                    value="{{ $grade->id }}" @if($class->grade_id == $grade->id) selected @endif >{{ $grade->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('classRoom.Close')}}
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-success">{{trans('classRoom.Save_Changes')}}</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                                {{--delete Modal Class --}}
                                <div class="modal fade" id="deleteClass{{$class->id}}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>{{trans('classRoom.Delete_Class')}}</h4>

                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="form" action="{{route('admin.classes.delete')}}"
                                                      method="post">
                                                    @csrf

                                                    <input type="hidden" name="id" value="{{$class->id}}" id="id">

                                                    <h5>{{trans('classRoom.Delete')}}</h5>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('classRoom.Close')}}
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{trans('classRoom.Delete_Action')}}</button>

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

                    {{-- Add Modal class --}}
                    <div class="modal fade bd-example-modal-lg" id="addClass" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title">
                                        <div class="mb-30">

                                            <h4>{{trans('classRoom.Add_Class')}}</h4>
                                        </div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class=" row mb-30" action="{{ route('admin.classes.store') }}" method="POST">
                                        @csrf

                                        <div class="card-body">
                                            <div class="repeater">
                                                <div data-repeater-list="List_Classes">
                                                    <div data-repeater-item>

                                                        <div class="row">

                                                            <div class="col-md-3">
                                                                <label for="Name"
                                                                       class="mr-sm-2">{{trans('classRoom.Name_English')}} :
                                                                </label>
                                                                <input class="form-control" type="text"
                                                                       name="name_class"/>
                                                            </div>


                                                            <div class="col-md-3">
                                                                <label for="Name"
                                                                       class="mr-sm-2">{{trans('classRoom.Name_Arabic')}} :
                                                                </label>
                                                                <input class="form-control" type="text"
                                                                       name="name_class_ar"/>
                                                            </div>


                                                            <div class="col-md-3">
                                                                <label for="name_class"
                                                                       class="mr-sm-2">{{trans('classRoom.Name_Grade')}} :
                                                                </label>

                                                                <div class="box">
                                                                    <select class="fancyselect" name="grade_id">
                                                                        @foreach ($grades as $grade)
                                                                            <option
                                                                                value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="Name_en"
                                                                       class="mr-sm-2">{{trans('classRoom.Actions')}} :
                                                                </label>
                                                                <input class="btn btn-danger btn-block"
                                                                       data-repeater-delete
                                                                       type="button" value="Delete"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-12">
                                                        <input class="button" data-repeater-create type="button"
                                                               value="Add Class"/>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('classRoom.Close')}}
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{trans('classRoom.Add')}}
                                                    </button>
                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>


                        {{--delete all Modal Class --}}
                        <div class="modal fade" id="delete_all" tabindex="-1" role="dialog"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            <div class="mb-30">

                                                <h4>{{trans('classRoom.Delete_Class')}}</h4>

                                            </div>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form" action="{{route('admin.classes.deleteAll')}}"
                                              method="post">
                                            @csrf

                                            <input type="hidden" name="delete_all_id" value="" id="delete_all_id">

                                            <h5>{{trans('classRoom.Delete')}}</h5>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{trans('classRoom.Close')}}
                                                </button>
                                                <button type="submit"
                                                        class="btn btn-danger">{{trans('classRoom.Delete_Action')}}</button>

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




@endsection

@section('script')

    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>

@endsection


