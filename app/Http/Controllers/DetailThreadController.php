<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailThreadController extends Controller
{

    public function index()
    {
        return view('detailthread');
 
    }

    public function myquestion()
    {   
        $user_id = Auth::user()->id;
        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->where('id_question', '=', $user_id)
                        
                        ->get();

        return view('myquestion', ['questions' => $questions]);
    }
    
}
