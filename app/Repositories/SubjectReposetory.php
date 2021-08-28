<?php

namespace App\Repositories;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectReposetory implements \App\Http\Interfaces\SubjectReposetoryInterface
{

    public function index()
    {
        $subjects = Subject::get();
        return view('pages.subjects.index', compact('subjects'));
    }

    public function create()
    {

        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.subjects.create', compact('grades', 'teachers'));
    }

    public function store($request)
    {

        try {

            Subject::create([

                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'teacher_id' => $request->teacher_id,

            ]);

            toastr()->success(trans('messagesT.Success'));
            return redirect()->route('admin.subjects.create');

        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getMessage()]);

        }
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.subjects.edit', compact('grades', 'teachers', 'subject'));
    }

    public function update($request)
    {
        try {

            $subject = Subject::findOrFail($request->subject_id);

            $subject->update([

                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'teacher_id' => $request->teacher_id,

            ]);

            toastr()->success(trans('messagesT.Update'));
            return redirect()->route('admin.subjects');

        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getMessage()]);

        }
    }

    public function destroy($request)
    {

        try {

            $subject = Subject::findOrFail($request->id);

            $subject->delete();

            toastr()->error(trans('messagesT.Delete'));
            return redirect()->route('admin.subjects');

        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getMessage()]);

        }

    }
}
