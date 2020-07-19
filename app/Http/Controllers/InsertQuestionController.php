<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class InsertQuestionController extends Controller
{

    public function index()
    {
        return view('insertquestion');
    }

    public function ask(Request $request) {

        Question::create([
            'title_question' => $request->title_question,
            'detail_question' => $request->detail_question
        ]);
        return redirect()->back();
    }
}