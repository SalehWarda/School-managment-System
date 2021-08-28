<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoomRequest;
use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{

    public function index()
    {
        //
        $data=[];
        $data['grades'] = Grade::all();
        $data['classes'] = ClassRoom::all();
        return view('pages.classes.classRoomList',$data);
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
    public function store(ClassRoomRequest $request)
    {
        //

      $list_classes = $request->List_Classes;

      foreach ($list_classes as $list_class){

          $classRoom = new ClassRoom();
          $classRoom->name_class = ['en' => $list_class['name_class'],'ar' => $list_class['name_class_ar']];

          $classRoom->grade_id = $list_class['grade_id'];
          $classRoom->save();

      }

        toastr()->success(trans('messagesT.Add'));

        return redirect()-> back();
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
    public function update(ClassRoomRequest $request)
    {
        //

        try {

            $classes = ClassRoom::find($request->id);
            if(!$classes)
                return redirect()->route('admin.classes')->with([
                    'message' => 'There is something wrong, This Class does not exist',
                    'alert-type' => 'danger',

                ]);

            $classes->update([

                $classes->name_class = ['en' => $request->name_class, 'ar' => $request->name_class_ar],
                $classes->grade_id =  $request->grade_id,

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
        $classes = ClassRoom::find($request->id);

        if(!$classes)
            return redirect()->route('admin.classes')->with([
                'message' => 'There is something wrong, This Class does not exist',
                'alert-type' => 'danger',

            ]);

        $classes->delete();
        toastr()->error(trans('messagesT.Delete'));

        return redirect()-> back();


    }


    public function deleteAll(Request $request)
    {
        //
       $delete_all_id = explode(",",$request->delete_all_id);

       ClassRoom::whereIn('id',$delete_all_id)->delete();
        toastr()->error(trans('messagesT.Delete'));

        return redirect()-> back();

    }

    public function filter(Request $request)
    {

        $grades = Grade::all();
        $classes = ClassRoom::select('*')->where('grade_id','=',$request->grade_id)->get();

        return view('pages.classes.classRoomList',compact('grades',))->withDetails($classes);

    }
}
