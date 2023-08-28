<?php

namespace App\Http\Controllers\Admin\Bet;

use App\Enum\BetstatusEnum;
use App\Http\Controllers\Controller;
use App\Models\QuestionOption;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BetwinController extends Controller
{
    public function betWin($id)
    {
        $option = QuestionOption::firstWhere('id', $id);
        $option->update(['is_win' => 1]);
        // return $option->optionbet;
        foreach ($option->optionbet as $key => $bet) {
            $bet->update(['status' => BetstatusEnum::WIN]);
            $user = $bet->user;
            $addBalance = $user->increment('balance', $bet->return_amount);

            $transaction = Transaction::create([
                'user_id' => $user->id,
                'credit' => $bet->return_amount,
                'description' => "Bet win !",
                'balance' =>  $user->balance,
            ]);

        }
    }

    public function betStop($id)
    {
        $option = QuestionOption::firstWhere('id', $id);
        $option->update(['is_hide' => 1]);
        return redirect()->back();
    }
    public function betStart($id)
    {
        $option = QuestionOption::firstWhere('id', $id);
        $option->update(['is_hide' => 0]);
        return redirect()->back();
    }
}
