<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\QuizzeReposetoiryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{

    public $quizzes;

    public function __construct(QuizzeReposetoiryInterface $quizzes)
    {
        $this->quizzes = $quizzes;
    }


    public function index()
    {
        return $this->quizzes->index();
    }


    public function create()
    {
        return $this->quizzes->create();

    }


    public function store(Request $request)
    {
        return $this->quizzes->store($request);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->quizzes->edit($id);
    }


    public function update(Request $request)
    {
        return $this->quizzes->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->quizzes->destroy($request);
    }
}
