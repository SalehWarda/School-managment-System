<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grades = Grade::with(['Sections'])->get();
        $list_grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.sections.sectionsList',compact('grades','list_grades','teachers'));
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
    public function store(SectionRequest $request)
    {
        //
        if(!$request->has('status'))
            $request->request->add(['status'=>0]);
        else
            $request->request->add(['status'=>1]);

        $sections = new Section();
        $sections->name = ['en' => $request->name,'ar' => $request->name_ar];
        $sections->grade_id = $request->Grade_id;
        $sections->class_id = $request->Class_id;
        $sections->status = $request->status;
        $sections->save();
        $sections->teachers()->attach( $request->teacher_id) ;

        toastr()->success(trans('messagesT.Add'));

        return redirect()->back();
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
    public function update(SectionRequest $request)
    {
        //

        try {

            if(!$request->has('status'))
                $request->request->add(['status'=>0]);
            else
                $request->request->add(['status'=>1]);


            $sections = Section::find($request->id);
            if(!$sections)
                return redirect()->route('admin.sections')->with([
                    'message' => 'There is something wrong, This Section does not exist',
                    'alert-type' => 'danger',

                ]);

            $sections->update([


            $sections->name = ['en' => $request->name,'ar' => $request->name_ar],
            $sections->grade_id = $request->Grade_id,
            $sections->class_id = $request->Class_id,
            $sections->status = $request->status,

            ]);
            if (isset($request->teacher_id)){

                $sections->teachers()->sync($request->teacher_id);
            }else{
                $sections->teachers()->sync(array());

            }

            toastr()->success(trans('messagesT.Update'));

            return redirect()-> back();




        }catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);
    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $sections = Section::find($request->id);

        if(!$sections)
            return redirect()->route('admin.sections')->with([
                'message' => 'There is something wrong, This Section does not exist',
                'alert-type' => 'danger',

            ]);

        $sections->delete();
        toastr()->error(trans('messagesT.Delete'));

        return redirect()-> back();

    }

    public function getclasses($id)
    {
        //

        $list_classes = ClassRoom::where('grade_id',$id)->pluck('name_class','id');
        return $list_classes;
    }
}
