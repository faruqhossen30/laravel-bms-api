<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Bet;
use App\Models\User;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function store(Request $request)
    {
        // $user = $request->user();
        $user = User::firstWhere('id', $request->user()->id);
        return $user;

        $request->validate([
            'matche_id' => 'required',
            'question_id' => 'required',
            'option_id' => 'required',
            'bet_rate' => 'required',
            'bet_amount' => 'required',
        ]);

        Bet::create([
            'user_id'=>$user->id,
            'matche_id'=>$request->matche_id,
            'question_id'=>$request->question_id,
            'option_id'=>$request->option_id,
            'bet_rate'=>$request->bet_rate,
            'bet_amount'=>$request->bet_amount,

            'club_id'=>$user->club_id,
            'sponsor_id'=>$user->sponsor_id,
            'club_commission'=>(2/100 * $request->bet_amount),

            'match_title'=>$request->match_title,
            'question_title'=>$request->question_title,
            'option_title'=>$request->option_title,
        ]);

        return $request->all();
    }
}
