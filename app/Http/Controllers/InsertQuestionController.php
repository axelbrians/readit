<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Question;

class InsertQuestionController extends Controller
{

    public function index()
    {
        return view('insertquestion');
    }

    public function ask(Request $request) {
        $user_id = Auth::user()->id;
        Question::create([
            'title_question' => $request->title_question,
            'detail_question' => $request->detail_question,
            'id_question' => $user_id
        ]);
        return redirect()->back();
    }
}