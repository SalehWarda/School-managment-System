<?php


namespace App\Repositories;


use App\Models\Fee;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;

class FeesRepository implements \App\Http\Interfaces\FeesRepositoryInterface
{


    public function index()
    {

        $fees = Fee::all();
        return view('pages.fees.fees',compact('fees'));

    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.fees.add',compact('grades'));
    }

    public function store($request)
    {
        $fees = new Fee();
        $fees->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
        $fees->amount = $request->amount;
        $fees->grade_id = $request->grade_id;
        $fees->classroom_id = $request->classroom_id;
        $fees->year = $request->year;
        $fees->fee_type = $request->fee_type;
        $fees->description = $request->description;
        $fees->save();

        toastr()->success(trans('messagesT.Add'));

        return redirect()->back();
    }


    public function edit($id)
    {
        $fees = Fee::findOrFail($id);

        $grades = Grade::all();

        return view('pages.fees.edit',compact('fees','grades'));
    }

    public function update($request)
    {

        $fees = Fee::findorfail($request->id);
        $fees->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
        $fees->amount = $request->amount;
        $fees->grade_id = $request->grade_id;
        $fees->classroom_id = $request->classroom_id;
        $fees->year = $request->year;
        $fees->fee_type = $request->fee_type;
        $fees->description = $request->description;
        $fees->save();

        toastr()->success(trans('messagesT.Update'));

        return redirect()->back();
    }

    public function destroy($request)
    {
        $fees = Fee::findorfail($request->id);

        $fees->delete();

        toastr()->error(trans('messagesT.Delete'));

        return redirect()->back();
    }
}
