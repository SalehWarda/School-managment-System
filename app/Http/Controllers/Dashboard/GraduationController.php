<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GraduationController extends Controller
{

    public function index()
    {
        //
        $students = Student::onlyTrashed()->get();
        return view('pages.students.graduate.graduates',compact('students'));
    }


    public function getGraduateManagement()
    {
        $grades = Grade::all();
        return view('pages.students.graduate.graduatingStudent',compact('grades'));
    }


    public function getGraduateInfo(Request $request)
    {
        //
             $students = Student::where('grade_id',$request->grade_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with([

                'alert-type'=>'danger',
                'message' => 'لا يوجد بيانات'

            ]);
        }


        foreach ($students as $student){

            $ids = explode(',',$student->id);
            Student::whereIn('id',$ids)->Delete();
        }
        toastr()->error(trans('messagesT.Delete'));

        return redirect()->back();




    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function return(Request $request)
    {
        //

        Student::onlyTrashed()->where('id',$request->student_id)->restore();
        toastr()->success(trans('messagesT.Success'));

        return redirect()->back();

    }


    public function destroy(Request $request)
    {
        //
        Student::onlyTrashed()->where('id',$request->student_id)->forceDelete();
        toastr()->error(trans('messagesT.Delete'));

        return redirect()->back();
    }
}
