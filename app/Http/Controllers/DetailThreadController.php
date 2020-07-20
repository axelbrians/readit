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
    public function thread()
    {

        return view('detailthread');
    }
    
}
