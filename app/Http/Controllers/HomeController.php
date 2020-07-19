<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
    //  showing all question sorted by latest created
    public function index()
    {   
        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->select('users.name', 'questions.id_question', 'questions.created_at', 'questions.updated_at',
                                'questions.title_question', 'questions.detail_question')
                        ->latest('questions.updated_at')
                        ->latest('questions.created_at')
                        ->get();

        return view('home', ['questions' => $questions]);
    }
}