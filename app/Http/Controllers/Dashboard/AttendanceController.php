<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AttendanceReposetoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{


    public $attendance;

    public function __construct(AttendanceReposetoryInterface $attendance)
    {
        $this->attendance = $attendance;

    }

    public function index()
    {
        //
       return   $this->attendance->index();
    }





    public function store(Request $request)
    {
        //
        return   $this->attendance->store($request);
    }


    public function show($id)
    {
        return   $this->attendance->show($id);

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
