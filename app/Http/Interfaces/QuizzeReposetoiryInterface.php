<?php

namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface QuizzeReposetoiryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($id);


}
