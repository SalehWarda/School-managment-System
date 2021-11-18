<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\OnlineClasses;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassesController extends Controller
{
    use MeetingZoomTrait;

    public function index()
    {
        //
      $online_Class =  OnlineClasses::all();


      return view('pages.onlineClasses.index',compact('online_Class'));




    }


    public function create()
    {
        //

        $grades = Grade::all();
        return view('pages.onlineClasses.add',compact('grades'));
    }

    public function indirectCreate()
    {
        //

        $grades = Grade::all();
        return view('pages.onlineClasses.indirect',compact('grades'));
    }


    public function store(Request $request)
    {
        //




            $meeting = $this->createMeeting($request);

            OnlineClasses::create([
                'integration' =>true,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messagesT.Success'));
            return redirect()->route('admin.onlineClasses');

    }

    public function indirectStore(Request $request)
    {
        try {
            OnlineClasses::create([

                'integration' =>false,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            toastr()->success(trans('messagesT.Success'));
            return redirect()->route('admin.onlineClasses');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        try {

            $info = OnlineClasses::find($request->id);

            if($info->integration == true){
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
                // OnlineClasses::where('meeting_id', $request->id)->delete();
                OnlineClasses::destroy($request->id);
            }
            else{
                // OnlineClasses::where('meeting_id', $request->id)->delete();
                OnlineClasses::destroy($request->id);
            }

            toastr()->success(trans('messagesT.Delete'));
            return redirect()->route('admin.onlineClasses');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
}
