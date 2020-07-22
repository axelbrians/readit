<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{

    public function delete(Request $request)
    {
        $id =$request->id;
        $questions = DB::table('questions')
                        ->join('users', 'users.id',  'questions.id_question')
                        ->select('users.name', 'questions.created_at', 'questions.updated_at',
                                'questions.title_question', 'questions.detail_question', 'questions.id as id')
                        ->where('questions.id',  $id)
                        ->delete();
                        // ->first();
        $answers = DB::table('answers')
                        ->join('users', 'users.id',  'answers.id_answer')
                        ->where('answers.id_question', $id)
                        ->delete();
                        // ->get();
        // return $id;
        // return view('detailthread')
        //         ->with(['questions' => $questions])
        //         ->with(['answers' => $answers]);
         return redirect('/home');
    }
}
