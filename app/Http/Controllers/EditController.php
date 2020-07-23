<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    //
    public function edit(Request $request)
    {
        $id =$request->id;
        $questions = DB::table('questions')
                    ->join('users', 'users.id',  'questions.id_question')
                    ->select('users.name', 'questions.created_at', 'questions.updated_at',
                            'questions.title_question', 'questions.detail_question', 'questions.id as id')
                    ->where('questions.id',  $id)
                    ->first();
        return view ('edit',['question'=>$questions]);
    }

    public function update(Request $request)
    {
        $id =$request->id;
        $questions = DB::table('questions')
                    ->where('questions.id',  $id)
                    ->update(['title_question'=>$request->title_question,
                            'detail_question'=>$request->detail_question]);
        return redirect('/home');
    }
}
