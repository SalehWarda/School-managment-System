<?php


namespace App\Repositories;


use App\Http\Interfaces\TeacherRepositoryInterface;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{

    public function getAllTeachers()
    {
         return Teacher::all();
    }

    public function getAllGender()
    {
        return Gender::all();

    }

    public function getAllSpecializations()
    {
        return Specialization::all();

    }

    public function storeTeacher($request)
    {

        try {

            $teachers = new Teacher();

            $teachers->email = $request->email;
            $teachers->password = Hash::make($request->password);
            $teachers->name = ['en' => $request->name_en,'ar' => $request->name_ar];
            $teachers->gender_id = $request->gender_id;
            $teachers->specialization_id = $request->specialization_id;
            $teachers->joining_date = $request->joining_date;
            $teachers->address = $request->address;
            $teachers->save();

            toastr()->success(trans('messagesT.Add'));

            return redirect()-> back();

        }catch (\Exception $ex){

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }

    }

    public function edit($id){

        return  Teacher::find($id);

    }

    public function update($request)
    {
        try {

            $teachers = Teacher::find($request->id);


            if (!$teachers){

                return redirect()->route('admin.teachers')->with([
                    'message' => 'حدث خطأ ما, هذا المعلم غير موجود!',
                    'alert-type' => 'danger'
                ]);
            }



            if (Hash::check($request->password, $teachers->password)) {

                $teachers->update([

                    'email' => $request->email,
                    'name' =>['en' => $request->name_en,'ar' => $request->name_ar],
                    'gender_id' => $request->gender_id,
                    'specialization_id' => $request->specialization_id,
                    'joining_date' => $request->joining_date,
                    'address' => $request->address

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


    public function destroy($request){

        $teachers = Teacher::find($request->id);


        if (!$teachers){

            return redirect()->route('admin.teachers')->with([
                'message' => 'حدث خطأ ما, هذا المعلم غير موجود!',
                'alert-type' => 'danger'
            ]);
        }

        $teachers->delete();
        toastr()->error(trans('messagesT.Delete'));

        return redirect()-> back();



    }


}
