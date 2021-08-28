<?php

namespace App\Repositories;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;

class QuizzeRepository implements \App\Http\Interfaces\QuizzeReposetoiryInterface
{

    public function index()
    {
        $quizzes = Quizze::get();
        return view('pages.quizzes.index',compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.quizzes.create', $data);
    }

    public function store($request)
    {
        try {

            Quizze::create([

                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id

            ]);

            toastr()->success(trans('messagesT.Success'));
            return redirect()->route('admin.quizzes');

        }catch (\Exception $ex){

            return redirect()->back()->with(['error' => $ex->getMessage()]);

        }
    }

    public function edit($id)
    {
        $quizzes = Quizze::findOrFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.quizzes.edit', $data,compact('quizzes'));
    }

    public function update($request)
    {
        try {
            $quizzes = Quizze::findOrFail($request->quizze_id);

            $quizzes->update([

                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id

            ]);

            toastr()->success(trans('messagesT.Update'));
            return redirect()->route('admin.quizzes');

        }catch (\Exception $ex){

            return redirect()->back()->with(['error' => $ex->getMessage()]);

        }
    }

    public function destroy($request)
    {
        try {
            $quizzes = Quizze::findOrFail($request->id);

            $quizzes->delete();

            toastr()->error(trans('messagesT.Delete'));
            return redirect()->back();

        }catch (\Exception $ex){

            return redirect()->back()->with(['error' => $ex->getMessage()]);

        }
    }
}
