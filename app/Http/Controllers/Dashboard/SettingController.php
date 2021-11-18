<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachmentLibraryTrait;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class SettingController extends Controller
{
    //
    use AttachmentLibraryTrait;

    public function index(){

        $collection = Setting::all();

        $setting['setting'] = $collection->flatMap(function($collection){

            return [$collection->key => $collection->value];


        });

        return view('pages.settings.settings',$setting);
    }

    public function Update(Request $request){

        try {


            $info = $request->except('_token','logo');
            foreach($info as $key=>$value){

             Setting::where('key',$key)->update(['value'=>$value]);


            }

            if($request->hasfile('logo')){

                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key','logo')->update(['value'=>$logo_name]);

                $this->fileupload($request,'logo','logo');
            }
            toastr()->success(trans('messagesT.Update'));
            return back();

        }  catch (\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }



    }

}
