@extends('layouts.dashboard')

@section('title',trans('title.Students') )

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('students.Student_Details') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('students.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('students.Student_Details') }}</li>
                </ol>
            </div>
        </div>
    </div>



    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="tab round">
                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active show" id="profile-07-tab" data-toggle="tab" href="#profile-07" role="tab" aria-controls="profile-07" aria-selected="false"><i class="fa fa-user"></i>{{trans('students.Student_Details') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="portfolio-07-tab" data-toggle="tab" href="#portfolio-07" role="tab" aria-controls="portfolio-07" aria-selected="false"><i class="fa fa-picture-o"></i> {{trans('students.Attachment') }}</a>
                        </li>

                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade active show" id="profile-07" role="tabpanel" aria-labelledby="profile-07-tab">
                            <div class="col-md-12 mb-30">
                                <div class="card card-statistics h-100">
                                    <div class="card-body">
                                        <h5 class="card-title border-0 pb-0">{{trans('students.Student_Details') }}</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table table-bordered table-3 text-center table-striped">

                                                <tbody>
                                                <tr>
                                                    <th>{{trans('students.Student_Name') }}</th>
                                                    <th>{{trans('students.Email') }}</th>
                                                    <th>{{trans('students.Gender') }}</th>
                                                    <th>{{trans('students.Student_Nationality') }}</th>
                                                    <th>{{trans('students.Grade') }}</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$student->email}}</td>
                                                    <td>{{$student->genders->name}}</td>
                                                    <td>{{$student->nationalities->name}}</td>
                                                    <td>{{$student->grades->name}}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{trans('students.Class_Room') }}</th>
                                                    <th>{{trans('students.Section') }}</th>
                                                    <th>{{trans('students.Birth_Date') }}</th>
                                                    <th>{{trans('students.The_Father') }}</th>
                                                    <th>{{trans('students.Academic_Year') }}</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$student->classes->name_class}}</td>
                                                    <td>{{$student->sections->name}}</td>
                                                    <td>{{$student->birth_date}}</td>
                                                    <td>{{$student->myparents->father_name}}</td>
                                                    <td>{{$student->academic_year}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="portfolio-07" role="tabpanel" aria-labelledby="portfolio-07-tab">

                            <div class="card card-statistics">
                                <div class="card-body">
                                    <form method="post" action="{{route('admin.students.upload_attachment')}}" enctype="multipart/form-data">

                                        @csrf

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="academic_year">{{trans('students.Attachment') }} : <span class="text-danger">*</span></label>
                                                <input type="file" accept="image/*" name="photos[]" multiple required>
                                                <input type="hidden" name="student_name" value="{{$student->name}}">
                                                <input type="hidden" name="student_id" value="{{$student->id}}">
                                            </div>
                                        </div>
                                        <br><br>
                                        <button type="submit" class=" btn btn-success">
                                            {{trans('students.Save') }}
                                        </button>
                                    </form>
                                </div>
                                <br>

                                <div class="col-md-12 mb-30">
                                    <div class="card card-statistics h-100">
                                        <div class="card-body">
                                            <h5 class="card-title border-0 pb-0">{{trans('students.Attachment') }}</h5>
                                            <div class="table-responsive">
                                                <table class="mb-0 table table-bordered table-3 text-center table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th># </th>
                                                        <th>{{trans('students.File_Name') }}</th>
                                                        <th>{{trans('students.Created_At') }}</th>
                                                        <th>{{trans('students.Actions') }}</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($student->images as $attachment)

                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$attachment->file_name}}</td>
                                                            <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                            <td>
                                                                <a class="btn btn-outline-info btn-sm" href="{{url('download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->file_name}}" role="button"><i class="fa fa-download"></i> {{trans('students.Download') }}</a>
                                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#Delete_img{{$attachment->id}}"
                                                                        title=""><i class="fa fa-trash-o"></i>{{trans('students.Delete_Action') }} </button>
                                                            </td>

                                                        </tr>

                                                        <!-- Deleted Img Student -->
                                                        <div class="modal fade" id="Delete_img{{$attachment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('students.Delete_Action') }} {{$attachment->file_name}}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{route('delete_attachment')}}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{$attachment->id}}">

                                                                            <input type="hidden" name="student_name" value="{{$attachment->imageable->name}}">
                                                                            <input type="hidden" name="student_id" value="{{$attachment->imageable->id}}">

                                                                            <h5 style="font-family: 'Cairo', sans-serif;">{{trans('students.Delete') }}</h5>
                                                                            <input type="text" name="file_name" readonly value="{{$attachment->file_name}}" class="form-control">

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('students.Close') }}</button>
                                                                                <button  class="btn btn-danger">{{trans('students.Delete_Action') }}</button>
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
                                </div>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

