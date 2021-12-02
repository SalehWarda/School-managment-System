<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        //

        return view('pages.auth.selection');
    }


//    public function getLogin()
//    {
//        //
//
//        return view('pages.auth.login');
//    }





    public function login(LoginRequest $request)
    {
        //  1- Validation  via LoginRequest

        // 2- Check in DB

        if ($request->type == "admin"){

            if (auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])) {

                return redirect()->route('admin.dashboard');
            }else{

                return redirect()->back()->with([
                    'message' => 'There is something wrong with the Data',
                    'alert-type' => 'danger'

                ]);
            }

        }

        if ($request->type == "teacher"){

            if (auth()->guard('teacher')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])) {

                return redirect()->route('admin.teachers');
            }else{

                return redirect()->back()->with([
                    'message' => 'There is something wrong with the Data',
                    'alert-type' => 'danger'

                ]);
            }

        }



    }

    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('admin.selection');
    }

    private function getGaurd()
    {
        return auth('admin');
    }


    public function loginForm($type)
    {

        return view('pages.auth.login',compact('type'));


    }

}
