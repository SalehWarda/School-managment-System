<?php

namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface AttendanceReposetoryInterface
{


    public function index();

    public function show($id);

    public function store($request);

}
