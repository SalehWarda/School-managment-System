<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;

class GradesController extends Controller
{

    public function index()
    {
        //
        $grades = Grade::all();

        return view('pages.grades.gradesList',compact('grades'));
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


    public function store(GradeRequest $request)
    {
        //
//        if (Grade::where('name->en',$request->name)->orWhere('name->ar',$request->name_ar)->exists()){
//
//            return redirect()->back()->withErrors( trans('grade.Exists'));
//        }

        try{


            $grades = new Grade();

            $grades->name = ['en' => $request->name, 'ar' => $request->name_ar];
            $grades->note = $request->note;
            $grades->save();
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GradeRequest $request)
    {
        //

//        if (Grade::where('name->en',$request->name)->orWhere('name->ar',$request->name_ar)->exists()){
//
//            return redirect()->back()->withErrors( trans('grade.Exists'));
//        }

        try{

            $grades = Grade::find($request->id);

            if(!$grades)
                return redirect()->route('admin.grades')->with([
                    'message' => 'There is something wrong, This grade does not exist',
                    'alert-type' => 'danger',

                ]);


            $grades->update([

                $grades->name = ['en' => $request->name, 'ar' => $request->name_ar],
                $grades->note =  $request->note,

            ]);

            toastr()->success(trans('messagesT.Update'));

            return redirect()-> back();

        }catch (\Exception $ex){

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
       $classes =  ClassRoom::where('grade_id',$request->id)->pluck('grade_id');


       if ($classes->count() == 0){

           $grades = Grade::find($request->id)->delete();
           toastr()->error(trans('messagesT.Delete'));

           return redirect()-> back();

       }else{
           toastr()->error(trans('messagesT.cantDeleteclass'));

           return redirect()-> back();

       }











    }
}
