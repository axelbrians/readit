<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailThreadController extends Controller
{
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

    // passing all answer correspond to current logged in user
    public function myanswer()
    {   
        $user_id = Auth::user()->id;
        $answers = DB::table('answers')
                        ->join('users', 'users.id', '=', 'answers.id_answer')
                        ->where('id_answer', '=', $user_id)
                        ->get();

        // return (['answers' => $answers]);
        return view('myanswer', ['answers' => $answers]);
    }


    // passing the the detail of correspond question and all of its replies
    public function thread(Request $request)
    {
        $id = $request->id;
        // return $id;
        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->select('users.name as name', 'questions.created_at', 'questions.updated_at',
                                'questions.title_question', 'questions.detail_question', 'questions.id as id', 'users.created_at as user_created_at')
                        ->where('questions.id', '=', $id)
                        ->first();

        $answers = DB::table('answers')
                        ->join('users', 'users.id', '=', 'answers.id_answer')
                        ->select('users.name as name', 'answers.created_at', 'answers.updated_at',
                                'answers.id_question', 'answers.id as id', 'answers.id_answer', 'users.created_at as user_created_at', 'answers.the_answer')
                        ->where('answers.id_question', '=', $id)
                        ->get();

        $count = DB::table('answers')
                    ->select('*')
                    ->where('answers.id_question', '=', $id)
                    ->count();

        // return (['questions' => $questions]);
        // return (['answers' => $answers]);
        return view('detailthread')
                ->with(['questions' => $questions])
                ->with(['answers' => $answers])
                ->with(['count' => $count]);
    }
}