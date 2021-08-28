<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <!-- menu item Dashboard-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                    <div class="pull-left"><i class="ti-home"></i><span
                            class="right-nav-text">{{trans('sidebar.Dashboard')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                    <li><a href="index.html">Dashboard 01</a></li>
                    <li><a href="index-02.html">Dashboard 02</a></li>
                    <li><a href="index-03.html">Dashboard 03</a></li>
                    <li><a href="index-04.html">Dashboard 04</a></li>
                    <li><a href="index-05.html">Dashboard 05</a></li>
                </ul>
            </li>
            <!-- menu title -->
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components</li>
            <!-- menu item Elements-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                    <div class="pull-left"><i class="ti-palette"></i><span
                            class="right-nav-text">{{trans('sidebar.Grades')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.grades')}}">{{trans('sidebar.Grades_List')}}</a></li>

                </ul>
            </li>
            <!-- menu item calendar-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                    <div class="pull-left"><i class="ti-calendar"></i><span
                            class="right-nav-text">{{trans('sidebar.Class_Room')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.classes')}}">{{trans('sidebar.Class_Room_List')}} </a></li>
                </ul>
            </li>

            <!-- menu item Charts-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                    <div class="pull-left"><i class="ti-pie-chart"></i><span
                            class="right-nav-text">{{trans('sidebar.Sections')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="chart" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.sections')}}">{{trans('sidebar.Sections_List')}}</a></li>

                </ul>
            </li>

            <!-- menu font icon-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                    <div class="pull-left"><i class="ti-home"></i><span
                            class="right-nav-text">{{trans('sidebar.Students')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="students-menu" class="collapse">


                    <li><a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{trans('sidebar.Students_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="Student_information" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('admin.students')}}">{{trans('sidebar.Students_List')}}</a></li>

                        </ul>

                    </li>
                    <li><a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_promotion">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{trans('sidebar.Students_Promotion')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>


                        <ul id="Student_promotion" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('admin.promotion')}}">{{trans('sidebar.Students_Promotion')}}</a></li>
                            <li>
                                <a href="{{route('admin.promotion.management')}}">{{trans('sidebar.Students_Promotion_Management')}}</a>
                            </li>


                        </ul>


                    </li>


                    <li><a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_graduate">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">الطلاب المتخرجين</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>


                        <ul id="Student_graduate" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('admin.graduates')}}">قائمة المتخرجين</a></li>
                            <li>
                                <a href="{{route('admin.graduate.management')}}">إدارة المتخرجين</a>
                            </li>


                        </ul>


                    </li>


                </ul>


            </li>


            <!-- menu item Form-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                    <div class="pull-left"><i class="ti-files"></i><span
                            class="right-nav-text">{{trans('sidebar.Teachers')}}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Form" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.teachers')}}">{{trans('sidebar.Teachers_List')}}</a></li>

                </ul>
            </li>
            <!-- menu item table -->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                    <div class="pull-left"><i class="ti-layout-tab-window"></i><span
                            class="right-nav-text">{{trans('sidebar.Parents')}}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="table" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.addParent')}}">{{trans('sidebar.Parents_List')}}</a></li>

                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                    <div class="pull-left"><i class="ti-money"></i><span
                            class="right-nav-text">{{trans('sidebar.Fees')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.fees')}}">الحسابات الدراسية</a></li>
                    <li><a href="{{route('admin.fee_invoice')}}">الفواتير</a></li>
                    <li><a href="{{route('admin.receipts')}}">سندات القبض</a></li>
                    <li><a href="{{route('admin.processingFee')}}">الرسوم المستبعدة</a></li>
                    <li><a href="{{route('admin.payment')}}">سندات الصرف</a></li>

                </ul>
            </li>
            <!-- menu item Authentication-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                    <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">{{trans('sidebar.Attendance')}}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.attendance')}}">{{trans('sidebar.Students_List')}}</a></li>

                </ul>
            </li>


            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#quizze">
                    <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">{{trans('sidebar.Subjects')}}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="quizze" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.subjects')}}">{{trans('sidebar.Subjects_List')}}</a></li>

                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject">
                    <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">{{trans('sidebar.Quizzes')}}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="subject" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.quizzes')}}">{{trans('sidebar.Quizzes_List')}}</a></li>

                </ul>
            </li>
            <!-- menu item maps-->
            <li>
                <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                    <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
            </li>
            <!-- menu item timeline-->
            <li>
                <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                </a>
            </li>
            <!-- menu item Multi level-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                    <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi level Menu</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level item
                            1
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="auth" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level
                                    item 1.1
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="login" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                           data-target="#invoice">level item 1.1.1
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="invoice" class="collapse">
                                            <li><a href="#">level item 1.1.1.1</a></li>
                                            <li><a href="#">level item 1.1.1.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">level item 1.2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level item
                            2
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="error" class="collapse">
                            <li><a href="#">level item 2.1</a></li>
                            <li><a href="#">level item 2.2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
