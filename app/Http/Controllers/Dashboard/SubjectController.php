<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\SubjectReposetoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public $subjects;

    public function __construct(SubjectReposetoryInterface $subjects)
    {
        $this->subjects = $subjects;

    }

    public function index()
    {
        return $this->subjects->index();
    }


    public function create()
    {
        return $this->subjects->create();
    }


    public function store(Request $request)
    {
        return $this->subjects->store($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->subjects->edit($id);
    }


    public function update(Request $request)
    {
        return $this->subjects->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->subjects->destroy($request);
    }
}
