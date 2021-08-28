@extends('layouts.dashboard')

@section('title','My Parents' )

@section('content')


    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('parents.Parents') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('parents.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{trans('parents.Parents') }}</li>
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

                    
                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <button type="button" class="button icon x-small left" data-toggle="modal"
                                    data-target="#addParent"
                                    href="#"> {{trans('parents.Add_Parent') }} <i class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr class="table-success">
                                <th>#</th>
                                <th>{{trans('parents.Email') }}</th>
                                <th>{{trans('parents.Father_Name') }}</th>
                                <th>{{trans('parents.ID_Number') }}</th>
                                <th>{{trans('parents.ID_Passport') }}</th>
                                <th>{{trans('parents.Phone') }}</th>
                                <th>{{trans('parents.Job') }}</th>
                                <th>{{trans('parents.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 0 ?>
                            @foreach($parents as $parent)
                                <?php $i++ ?>
                                <tr>


                                    <td>{{$i}}</td>
                                    <td>{{$parent->email}}</td>
                                    <td>{{$parent->father_name}}</td>
                                    <td>{{$parent->father_id_number}}</td>
                                    <td>{{$parent->father_passport_number}}</td>
                                    <td>{{$parent->father_phone}}</td>
                                    <td>{{$parent->father_job}}</td>
                                    <td>
                                        <a class="pr-2" data-toggle="modal" data-target="#editParent{{$parent->id}}"
                                           href="#"> <i
                                                class="fa fa-pencil"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteParent{{$parent->id}}"> <i
                                                class="fa fa-trash-o text-danger"></i></a>
                                    </td>
                                </tr>


                                {{-- Edit Modal Parent --}}
                                <div class="modal fade bd-example-modal-lg" id="editParent{{$parent->id}}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>{{trans('parents.Edit_Parent') }}</h4>
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="card card-statistics mb-30">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{trans('parents.Parents_Info') }}</h5>
                                                        <form id="signupForm" action="{{route('admin.addParent.update')}}" method="post" class="form-horizontal">
                                                            @csrf

                                                            <input type="hidden" name="parent_id" id="parent_id" value="{{$parent->id}}">

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="email">{{trans('parents.Email') }}</label>
                                                                    <input type="email" name="email" value="{{old('email',$parent->email)}}"
                                                                           class="form-control" id="email" placeholder="{{trans('parents.Email') }}">

                                                                    @error("email")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label for="password">{{trans('parents.Password') }}</label>
                                                                    <input type="password" name="password"
                                                                           value="{{old('password')}}" class="form-control"
                                                                           id="password" placeholder="{{trans('parents.Password') }}">

                                                                    @error("password")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="confirm_password">{{trans('parents.Confirm_Password') }}</label>
                                                                    <input type="password" name="confirm_password"
                                                                           value="{{old('confirm_password')}}" class="form-control"
                                                                           id="confirm_password" placeholder="{{trans('parents.Confirm_Password') }}">

                                                                    @error("confirm_password")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <h5 class="card-title col-md-6">{{trans('parents.Father_Info') }}</h5>
                                                                <h5 class="card-title col-md-6">{{trans('parents.Mother_Info') }}</h5>

                                                            </div>


                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <label for="fnamee">{{trans('parents.Father_Name_English') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{old('fnamee',$parent->getTranslation('father_name','en'))}}" id="fnamee" name="fnamee">

                                                                    @error("fnamee")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="fnamea">{{trans('parents.Father_Name_Arabic') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{old('fnamea',$parent->getTranslation('father_name','ar'))}}" id="fnamea" name="fnamea">

                                                                    @error("fnamea")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="mnamee">{{trans('parents.Mother_Name_English') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{old('mnamee',$parent->getTranslation('mother_name','en'))}}" id="mnamee" name="mnamee">

                                                                    @error("mnamee")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="mnamea">{{trans('parents.Mother_Name_Arabic') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{old('mnamea',$parent->getTranslation('mother_name','ar'))}}" id="mnamea" name="mnamea">

                                                                    @error("mnamea")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="father_id_number">{{trans('parents.Father_ID_Number') }}</label>
                                                                    <input type="text" name="father_id_number"
                                                                           value="{{old('father_id_number',$parent->father_id_number)}}" class="form-control"
                                                                           id="father_id_number">

                                                                    @error("father_id_number")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="father_passport_number">{{trans('parents.Father_Passport_Number') }}</label>
                                                                    <input type="text" name="father_passport_number"
                                                                           value="{{old('father_passport_number',$parent->father_passport_number)}}"
                                                                           class="form-control" id="father_passport_number">

                                                                    @error("father_passport_number")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="mother_id_number">{{trans('parents.Mother_ID_Number') }}</label>
                                                                    <input type="text" name="mother_id_number"
                                                                           value="{{old('mother_id_number',$parent->mother_id_number)}}" class="form-control"
                                                                           id="mother_id_number">

                                                                    @error("mother_id_number")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="mother_passport_number">{{trans('parents.Mother_Passport_Number') }}</label>
                                                                    <input type="text" name="mother_passport_number"
                                                                           value="{{old('mother_passport_number',$parent->mother_passport_number)}}"
                                                                           class="form-control" id="mother_passport_number">

                                                                    @error("mother_passport_number")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                            </div>


                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="father_phone">{{trans('parents.Father_Phone') }}</label>
                                                                    <input type="text" name="father_phone"
                                                                           value="{{old('father_phone',$parent->father_phone)}}" class="form-control"
                                                                           id="father_phone">

                                                                    @error("father_phone")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="mother_phone">{{trans('parents.Mother_Phone') }}</label>
                                                                    <input type="text" name="mother_phone"
                                                                           value="{{old('mother_phone',$parent->mother_phone)}}" class="form-control"
                                                                           id="mother_phone">

                                                                    @error("mother_phone")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>

                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="fjobe">{{trans('parents.Father_Job_English') }}</label>
                                                                    <input type="text" name="fjobe" value="{{old('fjobe',$parent->getTranslation('father_job','en'))}}"
                                                                           class="form-control" id="fjobe">

                                                                    @error("fjobe")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="fjoba">{{trans('parents.Father_Job_Arabic') }}</label>
                                                                    <input type="text" name="fjoba" value="{{old('fjoba',$parent->getTranslation('father_job','ar'))}}"
                                                                           class="form-control" id="fjoba">

                                                                    @error("fjoba")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="mjobe">{{trans('parents.Mother_Job_English') }}</label>
                                                                    <input type="text" name="mjobe" value="{{old('mjobe',$parent->getTranslation('mother_job','en'))}}"
                                                                           class="form-control" id="mjobe">

                                                                    @error("mjobe")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="mjoba">{{trans('parents.Mother_Job_Arabic') }}</label>
                                                                    <input type="text" name="mjoba" value="{{old('mjoba',$parent->getTranslation('mother_job','ar'))}}"
                                                                           class="form-control" id="mjoba">

                                                                    @error("mjoba")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                            </div>


                                                            <div class="form-row">
                                                                <div class="form-group col-md-2">
                                                                    <label for="father_nationality_id">{{trans('parents.Father_Nationality') }}</label>
                                                                    <select class="custom-select my-1 mr-sm-2"
                                                                            id="father_nationality_id" name="father_nationality_id">
                                                                        <option selected>{{trans('parents.Choose') }}...</option>
                                                                        @foreach($Nationalities as $National)
                                                                            <option
                                                                                value="{{$National->id}}" @if($parent->father_nationality_id == $National->id) selected @endif >{{$National->name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error("father_nationality_id")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label for="father_blood_type_id">{{trans('parents.Father_Blood_Type') }}</label>
                                                                    <select class="custom-select my-1 mr-sm-2"
                                                                            id="father_blood_type_id" name="father_blood_type_id">
                                                                        <option selected>{{trans('parents.Choose') }}...</option>
                                                                        @foreach($Type_Bloods as $Type_Blood)
                                                                            <option
                                                                                value="{{$Type_Blood->id}}" @if($parent->father_blood_type_id == $Type_Blood->id) selected @endif>{{$Type_Blood->name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error("father_blood_type_id")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label for="father_religion_id">{{trans('parents.Father_Religion') }}</label>
                                                                    <select class="custom-select my-1 mr-sm-2"
                                                                            id="father_religion_id" name="father_religion_id">
                                                                        <option selected>{{trans('parents.Choose') }}...</option>
                                                                        @foreach($Religions as $Religion)
                                                                            <option
                                                                                value="{{$Religion->id}}" @if($parent->father_religion_id == $Religion->id) selected @endif>{{$Religion->name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error("father_religion_id")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>

                                                                <div class="form-group col-md-2">
                                                                    <label for="mother_nationality_id">{{trans('parents.Mother_Nationality')}}</label>
                                                                    <select class="custom-select my-1 mr-sm-2"
                                                                            id="mother_nationality_id" name="mother_nationality_id">
                                                                        <option selected>{{trans('parents.Choose') }}...</option>
                                                                        @foreach($Nationalities as $National)
                                                                            <option
                                                                                value="{{$National->id}}" @if($parent->mother_nationality_id == $National->id) selected @endif>{{$National->name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error("mother_nationality_id")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label for="mother_blood_type_id">{{trans('parents.Mother_Blood_Type') }}</label>
                                                                    <select class="custom-select my-1 mr-sm-2"
                                                                            id="mother_blood_type_id" name="mother_blood_type_id">
                                                                        <option selected>{{trans('parents.Choose') }}...</option>
                                                                        @foreach($Type_Bloods as $Type_Blood)
                                                                            <option
                                                                                value="{{$Type_Blood->id}}" @if($parent->mother_blood_type_id == $Type_Blood->id) selected @endif>{{$Type_Blood->name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error("mother_blood_type_id")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label for="mother_religion_id">{{trans('parents.Mother_Religion') }}</label>
                                                                    <select class="custom-select my-1 mr-sm-2"
                                                                            id="mother_religion_id" name="mother_religion_id">
                                                                        <option selected>{{trans('parents.Choose') }}...</option>
                                                                        @foreach($Religions as $Religion)
                                                                            <option
                                                                                value="{{$Religion->id}}" @if($parent->mother_religion_id == $Religion->id) selected @endif>{{$Religion->name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error("mother_religion_id")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                            </div>

                                                            <div class="form-row">

                                                                <div class="form-group col-md-6">
                                                                    <label for="father_address">{{trans('parents.Father_Address') }} </label>
                                                                    <textarea class="form-control" name="father_address"
                                                                              id="father_address"
                                                                              rows="3">{{old('father_address',$parent->father_address)}}</textarea>

                                                                    @error("father_address")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="mother_address">{{trans('parents.Mother_Address') }}</label>
                                                                    <textarea class="form-control" name="mother_address"
                                                                              id="mother_address"
                                                                              rows="3">{{old('mother_address',$parent->mother_address)}}</textarea>

                                                                    @error("mother_address")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                            </div>


                                                            <button type="submit" class="btn btn-success">{{trans('parents.Save_Changes') }}</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                                {{--delete Modal Parent --}}
                                <div class="modal fade" id="deleteParent{{$parent->id}}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h4>{{trans('parents.Delete_Parent') }}</h4>

                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="form" action="{{route('admin.addParent.delete')}}"
                                                      method="post">
                                                    @csrf

                                                    <input type="hidden" name="parent_id" value="{{$parent->id}}" id="id">

                                                    <h5>{{trans('parents.Delete')}}</h5>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('parents.Close')}}
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{trans('parents.Delete_Action')}}</button>

                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endforeach




                        </table>
                    </div>

                    {{-- Add Modal Parent --}}
                    <div class="modal fade bd-example-modal-lg" id="addParent" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title">
                                        <div class="mb-30">

                                            <h4>{{trans('parents.Add_Parent') }}</h4>
                                        </div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="card card-statistics mb-30">
                                        <div class="card-body">
                                            <h5 class="card-title">{{trans('parents.Parents_Info') }}</h5>
                                            <form id="signupForm" action="{{route('admin.addParent.store')}}"
                                                  method="post" class="form-horizontal">
                                                @csrf


                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="email">{{trans('parents.Email') }}</label>
                                                        <input type="email" name="email" value="{{old('email')}}"
                                                               class="form-control" id="email" placeholder="{{trans('parents.Email') }}">

                                                        @error("email")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="password">{{trans('parents.Password') }}</label>
                                                        <input type="password" name="password"
                                                               value="{{old('password')}}" class="form-control"
                                                               id="password" placeholder="{{trans('parents.Password') }}">

                                                        @error("password")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="confirm_password">{{trans('parents.Confirm_Password') }}</label>
                                                        <input type="password" name="confirm_password"
                                                               value="{{old('confirm_password')}}" class="form-control"
                                                               id="confirm_password" placeholder="{{trans('parents.Confirm_Password') }}">

                                                        @error("confirm_password")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <h5 class="card-title col-md-6">{{trans('parents.Father_Info') }}</h5>
                                                    <h5 class="card-title col-md-6">{{trans('parents.Mother_Info') }}</h5>

                                                </div>


                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label for="fnamee">{{trans('parents.Father_Name_English') }}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{old('fnamee')}}" id="fnamee" name="fnamee">

                                                        @error("fnamee")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="fnamea">{{trans('parents.Father_Name_Arabic') }}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{old('fnamea')}}" id="fnamea" name="fnamea">

                                                        @error("fnamea")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="mnamee">{{trans('parents.Mother_Name_English') }}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{old('mnamee')}}" id="mnamee" name="mnamee">

                                                        @error("mnamee")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="mnamea">{{trans('parents.Mother_Name_Arabic') }}</label>
                                                        <input type="text" class="form-control"
                                                               value="{{old('mnamea')}}" id="mnamea" name="mnamea">

                                                        @error("mnamea")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="father_id_number">{{trans('parents.Father_ID_Number') }}</label>
                                                        <input type="text" name="father_id_number"
                                                               value="{{old('father_id_number')}}" class="form-control"
                                                               id="father_id_number">

                                                        @error("father_id_number")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="father_passport_number">{{trans('parents.Father_Passport_Number') }}</label>
                                                        <input type="text" name="father_passport_number"
                                                               value="{{old('father_passport_number')}}"
                                                               class="form-control" id="father_passport_number">

                                                        @error("father_passport_number")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="mother_id_number">{{trans('parents.Mother_ID_Number') }}</label>
                                                        <input type="text" name="mother_id_number"
                                                               value="{{old('mother_id_number')}}" class="form-control"
                                                               id="mother_id_number">

                                                        @error("mother_id_number")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="mother_passport_number">{{trans('parents.Mother_Passport_Number') }}</label>
                                                        <input type="text" name="mother_passport_number"
                                                               value="{{old('mother_passport_number')}}"
                                                               class="form-control" id="mother_passport_number">

                                                        @error("mother_passport_number")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="father_phone">{{trans('parents.Father_Phone') }}</label>
                                                        <input type="text" name="father_phone"
                                                               value="{{old('father_phone')}}" class="form-control"
                                                               id="father_phone">

                                                        @error("father_phone")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mother_phone">{{trans('parents.Mother_Phone') }}</label>
                                                        <input type="text" name="mother_phone"
                                                               value="{{old('mother_phone')}}" class="form-control"
                                                               id="mother_phone">

                                                        @error("mother_phone")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="fjobe">{{trans('parents.Father_Job_English') }}</label>
                                                        <input type="text" name="fjobe" value="{{old('fjobe')}}"
                                                               class="form-control" id="fjobe">

                                                        @error("fjobe")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="fjoba">{{trans('parents.Father_Job_Arabic') }}</label>
                                                        <input type="text" name="fjoba" value="{{old('fjoba')}}"
                                                               class="form-control" id="fjoba">

                                                        @error("fjoba")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="mjobe">{{trans('parents.Mother_Job_English') }}</label>
                                                        <input type="text" name="mjobe" value="{{old('mjobe')}}"
                                                               class="form-control" id="mjobe">

                                                        @error("mjobe")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="mjoba">{{trans('parents.Mother_Job_Arabic') }}</label>
                                                        <input type="text" name="mjoba" value="{{old('mjoba')}}"
                                                               class="form-control" id="mjoba">

                                                        @error("mjoba")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label for="father_nationality_id">{{trans('parents.Father_Nationality') }}</label>
                                                        <select class="custom-select my-1 mr-sm-2"
                                                                id="father_nationality_id" name="father_nationality_id">
                                                            <option selected>{{trans('parents.Choose') }}...</option>
                                                            @foreach($Nationalities as $National)
                                                                <option
                                                                    value="{{$National->id}}">{{$National->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @error("father_nationality_id")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="father_blood_type_id">{{trans('parents.Father_Blood_Type') }} </label>
                                                        <select class="custom-select my-1 mr-sm-2"
                                                                id="father_blood_type_id" name="father_blood_type_id">
                                                            <option selected>{{trans('parents.Choose') }}...</option>
                                                            @foreach($Type_Bloods as $Type_Blood)
                                                                <option
                                                                    value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @error("father_blood_type_id")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="father_religion_id">{{trans('parents.Father_Religion') }}</label>
                                                        <select class="custom-select my-1 mr-sm-2"
                                                                id="father_religion_id" name="father_religion_id">
                                                            <option selected>{{trans('parents.Choose') }}...</option>
                                                            @foreach($Religions as $Religion)
                                                                <option
                                                                    value="{{$Religion->id}}">{{$Religion->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @error("father_religion_id")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="mother_nationality_id">{{trans('parents.Mother_Nationality') }}</label>
                                                        <select class="custom-select my-1 mr-sm-2"
                                                                id="mother_nationality_id" name="mother_nationality_id">
                                                            <option selected>{{trans('parents.Choose') }}...</option>
                                                            @foreach($Nationalities as $National)
                                                                <option
                                                                    value="{{$National->id}}">{{$National->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @error("mother_nationality_id")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="mother_blood_type_id">{{trans('parents.Mother_Blood_Type') }}</label>
                                                        <select class="custom-select my-1 mr-sm-2"
                                                                id="mother_blood_type_id" name="mother_blood_type_id">
                                                            <option selected>{{trans('parents.Choose') }}...</option>
                                                            @foreach($Type_Bloods as $Type_Blood)
                                                                <option
                                                                    value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @error("mother_blood_type_id")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="mother_religion_id">{{trans('parents.Mother_Religion') }}</label>
                                                        <select class="custom-select my-1 mr-sm-2"
                                                                id="mother_religion_id" name="mother_religion_id">
                                                            <option selected>{{trans('parents.Choose') }}...</option>
                                                            @foreach($Religions as $Religion)
                                                                <option
                                                                    value="{{$Religion->id}}">{{$Religion->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @error("mother_religion_id")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label for="father_address">{{trans('parents.Father_Address') }} </label>
                                                        <textarea class="form-control" name="father_address"
                                                                  id="father_address"
                                                                  rows="3">{{old('father_address')}}</textarea>

                                                        @error("father_address")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mother_address">{{trans('parents.Mother_Address') }}</label>
                                                        <textarea class="form-control" name="mother_address"
                                                                  id="mother_address"
                                                                  rows="3">{{old('mother_address')}}</textarea>

                                                        @error("mother_address")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-success">{{trans('parents.Save_Data') }}</button>
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

