<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{

    public function delete(Request $request)
    {
        $user_id = Auth::user()->id;
        
        $question = DB::table('questions')
            ->where('id_question', '=', $user_id)
            ->first();
        $question= DB::table('questions')->delete();
        return redirect('/home');
    }
}
