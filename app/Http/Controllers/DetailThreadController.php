<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailThreadController extends Controller
{

    // // return detailthread view
    // public function index()
    // {
    //     return view('detailthread');
    // }

    // passing all question correspond to current logged in user
    public function myquestion()
    {   
        $user_id = Auth::user()->id;
        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->where('id_question', '=', $user_id)
                        ->get();

        return view('myquestion', ['questions' => $questions]);
    }

    // passing the the detail of correspond question and all of its replies
    public function thread(Request $request)
    {
        $id = $request->id;

        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->select('users.name', 'questions.created_at', 'questions.updated_at',
                                'questions.title_question', 'questions.detail_question', 'questions.id')
                        ->where('questions.id', '=', $id)
                        ->get();

        // return (['questions' => $questions]);

        // return view('detailthread', ['questions' => $questions]);

        $answers = DB::table('answers')
                        ->join('users', 'users.id', '=', 'answers.id_answer')
                        ->join('questions', 'questions.id_question', '=', 'answers.id_question')
                        ->get();

        return view('detailthread')
                ->with(['questions' => $questions])
                ->with(['answers' => $answers]);
    }
}