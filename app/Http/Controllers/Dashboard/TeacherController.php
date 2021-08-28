<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\TeacherRepositoryInterface;
use App\Http\Requests\TeacherRequest;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class TeacherController extends Controller
{

    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        return $this->Teacher = $Teacher;
    }

    public function index()
    {
        //
        $teachers = $this->Teacher->getAllTeachers();
        return view('pages.teachers.teacher',compact('teachers'));
    }



    public function create()
    {
        //
        $genders = $this->Teacher->getAllGender();
        $specializations= $this->Teacher->getAllSpecializations();
        return view('pages.teachers.create',compact('genders','specializations'));

    }


    public function store(TeacherRequest $request)
    {
        //
        return $this->Teacher->storeTeacher($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $teacher = $this->Teacher->edit($id);
        if (!$teacher){

            return redirect()->route('admin.teachers')->with([
                'message' => 'حدث خطأ ما, هذا المعلم غير موجود!',
                'alert-type' => 'danger'
            ]);
        }

        $genders = $this->Teacher->getAllGender();
        $specializations= $this->Teacher->getAllSpecializations();
        return view('pages.teachers.edit',compact('teacher','genders','specializations'));

    }


    public function update(TeacherRequest $request)
    {
        //
        return $this->Teacher->update($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        return $this->Teacher->destroy($request);
    }
}
