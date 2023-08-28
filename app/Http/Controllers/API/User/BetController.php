<?php

namespace App\Http\Controllers\API\User;

use App\Enum\BetstatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Bet;
use App\Models\MatcheQuestion;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class BetController extends Controller
{

    public function index(Request $request)
    {
        $bets = Bet::where('user_id', $request->user()->id)->get();
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $bets
        ]);
    }

    public function store(Request $request)
    {
        // $user = $request->user();
        $user = User::firstWhere('id', $request->user()->id);
        // return $user;

        $request->validate([
            'matche_id' => 'required',
            'question_id' => 'required',
            'option_id' => 'required',
            'bet_rate' => 'required',
            'bet_amount' => 'required',
        ]);


        $checkQuestion = MatcheQuestion::where([
            'id' => $request->question_id,
            'status' => 1
        ])->first();

        if ($checkQuestion) {
            $bet = Bet::create([
                'user_id' => $user->id,
                'matche_id' => $request->matche_id,
                'question_id' => $request->question_id,
                'option_id' => $request->option_id,
                'bet_rate' => $request->bet_rate,
                'bet_amount' => $request->bet_amount,
                'return_amount' => $request->bet_rate * $request->bet_amount,

                'club_id' => $user->club_id,
                'sponsor_id' => $user->sponsor_id,
                'club_commission' => (2 / 100 * $request->bet_amount),

                'match_title' => $request->match_title,
                'question_title' => $request->question_title,
                'option_title' => $request->option_title,
                'status' => BetstatusEnum::PENDING
            ]);

            if ($bet) {
                $user->decrement('balance', $request->bet_amount);



                Transaction::create([
                    'user_id' => $user->id,
                    'debit' => $request->bet_amount,
                    'credit' => 0,
                    'description' => "Bet placed {$request->bet_amount} taka.",
                    'balance' =>  $user->balance,
                ]);

                $club = User::firstWhere('id', $user->club_id);
                $clubCommission = ($club->club_commission / 100) * $request->bet_amount;
                $addBalanceToClub = $club->increment('balance', $clubCommission);

                // return $clubCommission;

                Transaction::create([
                    'user_id' => $club->id,
                    'debit' => 0,
                    'credit' => $clubCommission,
                    'description' => "Commission",
                    'balance' =>  $club->balance,
                ]);
            }
            return response()->json([
                'message' => 'Bet successfully submited !'
            ]);
        } else {
            return response()->json([
                'message' => 'This bet Not available now !'
            ]);
        }




        return $request->all();
    }
}
