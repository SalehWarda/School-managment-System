<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class QuestionController extends Controller
{

    public $questions;

    public function __construct(QuestionRepositoryInterface $questions)
    {

        $this->questions = $questions;
    }

    public function index($id)
    {
        //
        return $this->questions->index($id);
    }


    public function create($id)
    {
        //
        return $this->questions->create($id);
    }


    public function store(Request $request)
    {




        $question = new Question();

            $question->title = $request->title;
            $question->right_answer = $request->right_answer;
            $question->quizze_id = $request->quizze_id;
            $question->score = $request->score;






        if ($request->has('answersQ')){
            foreach ($request->answersQ as $answerQ){

                $question->answers = $answerQ['answers'];



           }




       }


        return $question;

        toastr()->success(trans('messagesT.Add'));

        return redirect()-> back();
    }


    public function show($id)
    {
        //
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
