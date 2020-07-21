<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    //
    public function edit(Request $request)
    {
        $user_id = Auth::user()->id;

        $question = DB::table('questions')
            ->where('id_question', '=', $user_id)
            ->first();
        return view ('qedit',['question'=>$question]);
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        
        $question = DB::table('questions')
            ->where('id_question', '=', $user_id)
            ->first();
        $question= DB::table('questions')->update(['title_question'=>$request->title_question,
                                                   'detail_question'=>$request->detail_question]);
        return redirect('/home');
    }
}
