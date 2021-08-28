<?php


namespace App\Repositories;


use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitle;
use App\Models\Student;
use App\Models\TypeBlood;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements \App\Http\Interfaces\StudentRepositoryInterface
{

    public function create(){

        $data=[];
        $data['genders'] = Gender::all();
        $data['nationals'] = Nationalitle::all();
        $data['bloods'] = TypeBlood::all();
        $data['grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        return view('pages.students.create',$data);
    }

    public function store($request){

        try {

          $students =  Student::create([

                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender_id' => $request->gender_id,
                'nationalitles_id' => $request->nationalitles_id,
                'blood_id' => $request->blood_id,
                'birth_date' => $request->birth_date,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'parent_id' => $request->parent_id,
                'academic_year' => $request->academic_year,
            ]);

            if ($request->hasfile('photos')){

                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->file_name=$name;
                    $images->imageable_id= $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }

            toastr()->success(trans('messagesT.Add'));

            return redirect()->back();


        }catch (\Exception $ex){

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }
    }

    public function edit($id){

        $students = Student::findOrFail($id);
        $data=[];
        $data['genders'] = Gender::all();
        $data['nationals'] = Nationalitle::all();
        $data['bloods'] = TypeBlood::all();
        $data['grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        return view('pages.students.edit',$data,compact('students'));
    }

    public function update($request){


        try {

            $students = Student::findOrFail($request->id);


            if (!$students){

                return redirect()->route('admin.students')->with([
                    'message' => 'حدث خطأ ما, هذا الطالب غير موجود!',
                    'alert-type' => 'danger'
                ]);
            }



            if (Hash::check($request->password, $students->password)) {

                $students->update([


                    'name' =>['en' => $request->name_en,'ar' => $request->name_ar],
                    'email' => $request->email,
                    'gender_id' => $request->gender_id,
                    'nationalitles_id' => $request->nationalitles_id,
                    'blood_id' => $request->blood_id,
                    'birth_date' => $request->birth_date,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'parent_id' => $request->parent_id,
                    'academic_year' => $request->academic_year,

                ]);
                toastr()->success(trans('messagesT.Update'));

                return redirect()-> back();

            }else {

                return redirect()->back()->with([
                    'message' => 'Current Password is rong, Try again.',
                    'alert-type' => 'danger',
                ]);
            }




        }catch (\Exception $ex){

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }
    }


    public function destroy($request)
    {

        $students = Student::find($request->id);


        if (!$students){

            return redirect()->route('admin.students')->with([
                'message' => 'حدث خطأ ما, هذا الطالب غير موجود!',
                'alert-type' => 'danger'
            ]);
        }

        $students->forceDelete();
        toastr()->error(trans('messagesT.Delete'));

        return redirect()-> back();
    }

}
