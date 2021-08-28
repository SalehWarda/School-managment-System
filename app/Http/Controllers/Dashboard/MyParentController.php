<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MyParentRequest;
use App\Models\MyParent;
use App\Models\Nationalitle;
use App\Models\Religions;
use App\Models\TypeBlood;
use Illuminate\Http\Request;

class MyParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $data=[];
       $data['Nationalities']  =  Nationalitle::all();
       $data['Type_Bloods']    =  TypeBlood::all();
       $data['Religions']      = Religions::all();
       $data['parents']      = MyParent::all();

        return view('pages.myParents.myParent',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MyParentRequest $request)
    {
        //


        try {

            MyParent::create([

                // Father Input
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'father_name'=>['en'=>$request->fnamee,'ar'=>$request->fnamea],
                'father_id_number'=>$request->father_id_number,
                'father_passport_number'=>$request->father_passport_number,
                'father_phone'=>$request->father_phone,
                'father_job'=>['en'=>$request->fjobe,'ar'=>$request->fjoba],
                'father_nationality_id'=>$request->father_nationality_id,
                'father_blood_type_id'=>$request->father_blood_type_id,
                'father_religion_id'=>$request->father_religion_id,
                'father_address'=>$request->father_address,

                // Mother Input
                'mother_name'=>['en'=>$request->mnamee,'ar'=>$request->mnamea],
                'mother_id_number'=>$request->mother_id_number,
                'mother_passport_number'=>$request->mother_passport_number,
                'mother_phone'=>$request->mother_phone,
                'mother_job'=>['en'=>$request->mjobe,'ar'=>$request->mjoba],
                'mother_nationality_id'=>$request->mother_nationality_id,
                'mother_blood_type_id'=>$request->mother_blood_type_id,
                'mother_religion_id'=>$request->mother_religion_id,
                'mother_address'=>$request->mother_address,

            ]);

            toastr()->success(trans('messagesT.Add'));

            return redirect()-> back();

        }catch (\Exception $ex){

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        try {

            $parents= MyParent::find($request->parent_id);
            if(!$parents)
                return redirect()->route('admin.addParent')->with([
                    'message' => 'There is something wrong, This Class does not exist',
                    'alert-type' => 'danger',

                ]);

            $parents->update([

                'email' => $request->email,
                'password' => bcrypt($request->password),
                'father_name'=>['en'=>$request->fnamee,'ar'=>$request->fnamea],
                'father_id_number'=>$request->father_id_number,
                'father_passport_number'=>$request->father_passport_number,
                'father_phone'=>$request->father_phone,
                'father_job'=>['en'=>$request->fjobe,'ar'=>$request->fjoba],
                'father_nationality_id'=>$request->father_nationality_id,
                'father_blood_type_id'=>$request->father_blood_type_id,
                'father_religion_id'=>$request->father_religion_id,
                'father_address'=>$request->father_address,

                // Mother Input
                'mother_name'=>['en'=>$request->mnamee,'ar'=>$request->mnamea],
                'mother_id_number'=>$request->mother_id_number,
                'mother_passport_number'=>$request->mother_passport_number,
                'mother_phone'=>$request->mother_phone,
                'mother_job'=>['en'=>$request->mjobe,'ar'=>$request->mjoba],
                'mother_nationality_id'=>$request->mother_nationality_id,
                'mother_blood_type_id'=>$request->mother_blood_type_id,
                'mother_religion_id'=>$request->mother_religion_id,
                'mother_address'=>$request->mother_address,

            ]);

            toastr()->success(trans('messagesT.Update'));

            return redirect()-> back();




        }catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }

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
        try {

            $parents= MyParent::find($request->parent_id);
            if(!$parents)
                return redirect()->route('admin.addParent')->with([
                    'message' => 'There is something wrong, This Class does not exist',
                    'alert-type' => 'danger',

                ]);

            $parents->delete();

            toastr()->success(trans('messagesT.Delete'));

            return redirect()-> back();




        }catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }

    }
}
