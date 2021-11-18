<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\Quizze;

class QuestionRepository implements \App\Http\Interfaces\QuestionRepositoryInterface
{

    public function index($id)
    {
        $quizzes = Quizze::findOrFail($id) ;

        return view('pages.questions.index',compact('quizzes'));
    }

    public function create($id)
    {
        $quizzes = Quizze::findOrFail($id) ;
        return view('pages.questions.create',compact('quizzes'));
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
