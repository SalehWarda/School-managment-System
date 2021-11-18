<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
        //

        return view('pages.auth.login');
    }





    public function login(LoginRequest $request)
    {
        //  1- Validation  via LoginRequest

        // 2- Check in DB

             $remember_me = $request->has('remember_me')? true  : false;
             if (auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me)) {

                 return redirect()->route('admin.dashboard');
             }
             return redirect()->back()->with([
                 'message' => 'There is something wrong with the Data',
                 'alert-type' => 'danger'

             ]);

    }

    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('admin.getLogin');
    }

    private function getGaurd()
    {
        return auth('admin');
    }

}
