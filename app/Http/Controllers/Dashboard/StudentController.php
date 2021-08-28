<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\StudentRepositoryInterface;
use App\Http\Interfaces\TeacherRepositoryInterface;
use App\Http\Requests\StudenRequest;
use App\Models\ClassRoom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitle;
use App\Models\Section;
use App\Models\Student;
use App\Models\TypeBlood;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    protected $Student;
    public function __construct(StudentRepositoryInterface $Student)
    {
        return $this->Student = $Student;
    }

    public function index()
    {
        //
        $students = Student::all();
        return view('pages.students.student',compact('students'));
    }


    public function create()
    {

      return $this->Student->create();
    }


    public function store(StudenRequest $request)
    {


       return $this->Student->store($request);
    }





    public function edit($id)
    {

     return $this->Student->edit($id);

    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
     return view('pages.students.show',compact('student'));
    }


    public function Upload_attachment(Request $request)
    {
        if ($request->hasfile('photos')){

            foreach($request->file('photos') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

                // insert in image_table
                $images= new Image();
                $images->file_name=$name;
                $images->imageable_id= $request->student_id;
                $images->imageable_type = 'App\Models\Student';
                $images->save();
            }
        }

        toastr()->success(trans('messagesT.Add'));

        return redirect()->back();

    }


    public function download_attachment($studentsname, $filename)
    {


        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function delete_attachment(Request $request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->file_name);

        // Delete in data
        Image::where('id',$request->id)->where('file_name',$request->file_name)->delete();
        toastr()->error(trans('messagesT.Delete'));
        return redirect()->back();
    }


    public function update(StudenRequest $request)
    {

       return $this->Student->update($request);
    }


    public function destroy(Request $request)
    {
        //
       return $this->Student->destroy($request);
    }

    public function getclasses($id)
    {
        //

        $list_classes = ClassRoom::where('grade_id',$id)->pluck('name_class','id');
        return $list_classes;
    }

    public function getsections($id)
    {
        //

        $list_section = Section::where('class_id',$id)->pluck('name','id');
        return $list_section;
    }

    public function graduate(Request $request)
    {
        //
        $students = Student::find($request->student_id);


        if (!$students){

            return redirect()->route('admin.students')->with([
                'message' => 'حدث خطأ ما, هذا الطالب غير موجود!',
                'alert-type' => 'danger'
            ]);
        }

        $students->delete();
        toastr()->success(trans('messagesT.Success'));

        return redirect()-> back();

      }
}
