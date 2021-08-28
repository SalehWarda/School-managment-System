<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function index()
    {
        //
       $grades = Grade::all();
        return view('pages.students.promotion',compact('grades'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //

        $students = Student::where('grade_id',$request->grade_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();

        if($students->count() < 1){
            return redirect()->back()->with([

                'alert-type'=>'danger',
                'message' => 'لا يوجد بيانات'

            ]);
        }

        foreach ($students as $student){

            $ids = explode(',',$student->id);
            student::whereIn('id', $ids)
                ->update([
                    'grade_id'=>$request->grade_id_new,
                    'classroom_id'=>$request->classroom_id_new,
                    'section_id'=>$request->section_id_new,
                    'academic_year'=>$request->academic_year_new,
                ]);

            Promotion::updateOrCreate([

                'student_id' => $student->id,
                'from_grade' => $request->grade_id,
                'from_classroom' => $request->classroom_id,
                'from_section' => $request->section_id,
                'from_academic_year' => $request->academic_year,
                'to_grade' => $request->grade_id_new,
                'to_classroom' => $request->classroom_id_new,
                'to_section' => $request->section_id_new,
                'to_academic_year_new' => $request->academic_year_new,

            ]);
        }

        toastr()->success(trans('messagesT.Update'));
        return redirect()->back();
    }


    public function getPromotionManagement()
    {
        //
        $promotions = Promotion::all();
        return view('pages.students.promotionManagement',compact('promotions'));
    }


    public function backPromotion(Request $request)
    {
        //
       if ($request->backAll_promotion == 1){

           $promotions = Promotion::all();

           foreach ($promotions as $promotion){

               $ids = explode(',',$promotion->student_id);
               Student::whereIn('id', $ids)->update([

                   'grade_id' => $promotion->from_grade,
                   'classroom_id' => $promotion->from_classroom,
                   'section_id' => $promotion->from_section,
                   'academic_year' => $promotion->from_academic_year,

               ]);

               Promotion::truncate();
           }

           toastr()->success(trans('messagesT.Update'));
           return redirect()->back();


       }else{

           $promotion = Promotion::findorfail($request->id);
           Student::where('id', $promotion->student_id)
               ->update([
                   'grade_id' => $promotion->from_grade,
                   'classroom_id' => $promotion->from_classroom,
                   'section_id' => $promotion->from_section,
                   'academic_year' => $promotion->from_academic_year,
               ]);


           Promotion::destroy($request->id);

           toastr()->error(trans('messagesT.Delete'));
           return redirect()->back();

       }


    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
