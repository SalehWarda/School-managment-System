@extends('layouts.dashboard')

@section('title',trans('title.Sections') )

@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('section.Sections_List') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('section.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('section.Sections_List') }}</li>
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
                                    data-target="#addSection"
                                    href="#"> {{trans('section.Add_Section') }} <i class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <br><br>


                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="accordion plus-icon shadow">

                                    @foreach($list_grades as $list_grade)

                                        <div class="acd-group">
                                            <a href="#" class="acd-heading"><strong>{{$list_grade->name}}</strong></a>
                                            <div class="acd-des">



                                                                    <div class="table-responsive mt-15">
                                                                        <table class="table center-aligned-table mb-0">
                                                                            <thead>
                                                                            <tr class="text-dark">
                                                                                <th>#</th>
                                                                                <th>{{trans('section.Section_Name') }}</th>
                                                                                <th>{{trans('section.Class_Name') }}</th>
                                                                                <th>{{trans('section.Status') }}</th>
                                                                                <th>{{trans('section.Actions') }}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>


                                                                            <?php $i=0 ?>
                                                                            @foreach($list_grade->Sections as $section)
                                                                                <?php $i++ ?>
                                                                                <tr>
                                                                                    <td>{{$i}}</td>
                                                                                    <td>{{$section->name}}</td>
                                                                                    <td>{{$section->classes->name_class}}</td>
                                                                                    <td>
                                                                                        @if ($section->status === 1)
                                                                                            <label
                                                                                                class="badge badge-success">{{trans('section.Active') }}</label>
                                                                                        @else
                                                                                            <label
                                                                                                class="badge badge-danger">{{trans('section.UnActive') }}</label>
                                                                                        @endif</td>

                                                                                    <td>

                                                                                        <a class="pr-2" data-toggle="modal" data-target="#editSection{{$section->id}}" href="#"> <i class="fa fa-pencil"></i></a>
                                                                                        <a href="#" data-toggle="modal" data-target="#deleteSection{{$section->id}}"> <i class="fa fa-trash-o text-danger"></i></a>
                                                                                    </td>

                                                                                </tr>

                                                                                {{--Edit Modal Section--}}
                                                                                <div class="modal fade" id="editSection{{$section->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <div class="modal-title">
                                                                                                    <div class="mb-30">

                                                                                                        <h4>{{trans('section.Edit_Section') }}</h4>

                                                                                                    </div>
                                                                                                </div>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="card card-statistics mb-30">
                                                                                                    <div class="card-body">

                                                                                                        <form class="form" action="{{route('admin.sections.update')}}" method="post">
                                                                                                            @csrf
                                                                                                            <input name="id" type="hidden" value="{{$section->id}}">
                                                                                                            <div class="row">
                                                                                                                <div class=" col-md-6 form-group">
                                                                                                                    <input type="text" class="form-control" value="{{$section->getTranslation('name','en')}}" name="name" id="name" placeholder="{{trans('section.Name_English') }}" >
                                                                                                                </div>

                                                                                                                <div class="col-md-6 form-group">
                                                                                                                    <input type="text" class="form-control" value="{{$section->getTranslation('name','ar')}}" name="name_ar" id="name_ar" placeholder="{{trans('section.Name_Arabic') }}">
                                                                                                                </div>

                                                                                                            </div>
                                                                                                            <div class="col">
                                                                                                                <label for="inputName"
                                                                                                                       class="control-label">{{trans('section.Name_Grade') }}</label>
                                                                                                                <select name="Grade_id" class="custom-select"
                                                                                                                        onchange="console.log($(this).val())">
                                                                                                                    <!--placeholder-->
                                                                                                                    <option value="" selected disabled>{{trans('section.Select_Grade') }} </option>
                                                                                                                    @foreach ($list_grades as $list_grade)

                                                                                                                        <option value="{{ $list_grade->id }} " @if($section->grade_id == $list_grade->id) selected @endif > {{ $list_grade->name }} </option>

                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="col">
                                                                                                                <label for="inputName"
                                                                                                                       class="control-label">{{trans('section.Class_Name') }}</label>
                                                                                                                <select name="Class_id" class="custom-select">

                                                                                                                    <option value="{{$section->classes->id}}"> {{ $section->classes->name_class }}</option>

                                                                                                                </select>
                                                                                                            </div><br>

                                                                                                            <div class="col">
                                                                                                                <label for="inputName"
                                                                                                                       class="control-label">Choose Teacher</label>
                                                                                                                <select multiple name="teacher_id[]" class="custom-select" >
                                                                                                                    <!--placeholder-->
                                                                                                                    <option value="Choose ..." selected disabled>Choose ...</option>
                                                                                                                    @foreach ($teachers as $teacher)

                                                                                                                        <option value="{{ $teacher->id }}"  @if(in_array($teacher->id,$section->teachers->pluck('id')->toArray())) selected @endif> {{ $teacher->name }} </option>

                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>

                                                                                                            <br>
                                                                                                            <p class="text-muted"><b>{{trans('section.Status') }}</b></p>
                                                                                                            <div class="form-group">
                                                                                                                <div class="checkbox checbox-switch switch-success">
                                                                                                                    <label>
                                                                                                                        <input type="checkbox" name="status" @if($section->status == 1) checked @endif />
                                                                                                                        <span></span>

                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('section.Close') }}
                                                                                                                </button>
                                                                                                                <button type="submit" class="btn btn-success ">{{trans('section.Save_Changes') }} </i></button>

                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                {{--delete Modal Class --}}
                                                                                <div class="modal fade" id="deleteSection{{$section->id}}" tabindex="-1" role="dialog"
                                                                                     aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <div class="modal-title">
                                                                                                    <div class="mb-30">

                                                                                                        <h4>{{trans('section.Delete_Section')}}</h4>

                                                                                                    </div>
                                                                                                </div>
                                                                                                <button type="button" class="close" data-dismiss="modal"
                                                                                                        aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">

                                                                                                <form class="form" action="{{route('admin.sections.delete')}}"
                                                                                                      method="post">
                                                                                                    @csrf

                                                                                                    <input type="hidden" name="id" value="{{$section->id}}" id="id">

                                                                                                    <h5>{{trans('section.Delete')}}</h5>


                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary"
                                                                                                                data-dismiss="modal">{{trans('section.Close')}}
                                                                                                        </button>
                                                                                                        <button type="submit"
                                                                                                                class="btn btn-danger">{{trans('section.Delete_Action')}}</button>

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






                                            </div>
                                        </div>

                                    @endforeach

                                        {{-- Add Modal Grade--}}
                                        <div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="modal-title">
                                                            <div class="mb-30">

                                                                <h4>{{trans('section.Add_Section') }}</h4>

                                                            </div>
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card card-statistics mb-30">
                                                            <div class="card-body">

                                                                <form class="form" action="{{route('admin.sections.store')}}" method="post">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class=" col-md-6 form-group">
                                                                            <input type="text" class="form-control" name="name" id="name" placeholder="{{trans('section.Name_English') }}" >
                                                                        </div>

                                                                        <div class="col-md-6 form-group">
                                                                            <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="{{trans('section.Name_Arabic') }}">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="inputName"
                                                                               class="control-label">{{trans('section.Name_Grade') }}</label>
                                                                        <select name="Grade_id" class="custom-select"
                                                                                onchange="console.log($(this).val())">
                                                                            <!--placeholder-->
                                                                            <option value="" selected disabled>{{trans('section.Select_Grade') }} </option>
                                                                            @foreach ($list_grades as $list_grade)

                                                                                <option value="{{ $list_grade->id }}"> {{ $list_grade->name }} </option>

                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="inputName"
                                                                               class="control-label">{{trans('section.Class_Name') }} </label>
                                                                        <select name="Class_id" class="custom-select">

                                                                        </select>
                                                                    </div><br>
                                                                    <div class="col">
                                                                        <label for="inputName"
                                                                               class="control-label">Choose Teacher</label>
                                                                        <select multiple name="teacher_id[]" class="custom-select" >
                                                                            <!--placeholder-->
                                                                            <option value="" selected disabled>Choose ...</option>
                                                                            @foreach ($teachers as $teacher)

                                                                                <option value="{{ $teacher->id }}"> {{ $teacher->name }} </option>

                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <br>
                                                                    <p class="text-muted"><b>{{trans('section.Status') }} </b></p>
                                                                    <div class="form-group">
                                                                        <div class="checkbox checbox-switch switch-success">
                                                                            <label>
                                                                                <input type="checkbox" name="status" checked/>
                                                                                <span></span>

                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('section.Close') }}
                                                                        </button>
                                                                        <button type="submit" class="btn btn-success ">{{trans('section.Add') }}  <i class="fa fa-plus"></i></button>

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


                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/Sections/classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
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
