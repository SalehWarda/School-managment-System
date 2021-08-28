@extends('layouts.dashboard')

@section('title',trans('title.Sections') )

@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">الحضور والغياب</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('section.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">الحضور والغياب</li>
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


                    <br><br>


                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="accordion plus-icon shadow">

                                    @foreach($grades as $grade)

                                        <div class="acd-group">
                                            <a href="#" class="acd-heading"><strong>{{$grade->name}}</strong></a>
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


                                                        <?php $i = 0 ?>
                                                        @foreach($grade->Sections as $section)
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

                                                                    <a href="{{route('admin.attendance.show',$section->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">{{trans('attendance.Student_List') }}</a>

                                                                </td>

                                                            </tr>


                                                        @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>
                                        </div>

                                    @endforeach



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
