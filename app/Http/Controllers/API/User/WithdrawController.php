<?php

namespace App\Http\Controllers\API\User;

use App\Enum\WithdrawEnum;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index(Request $request){
        $withdraws = Withdraw::get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $withdraws
        ]);
    }
    public function store(Request $request)
    {
        $user = User::firstWhere('id', $request->user()->id);

        $request->validate([
            'method' => 'required',
            'type' => 'required',
            'account' => 'required',
            // 'password' => 'required',
            'amount' => "required|numeric|max:{$user->balance}",
        ]);

        // if (Hash::check($request->password, $request->user()->password)) {
        //     // passwords match
        // } else {
        //     // passwords do not match
        // }


        $withdraw = Withdraw::create([
            'user_id' => $user->id,
            'method' => $request->method,
            'type' => $request->type,
            'account' => $request->account,
            'amount' => $request->amount,
            'status' => WithdrawEnum::PENDING,
        ]);

        if ($withdraw) {
            $user->decrement('balance', $request->amount);
            Transaction::create([
                'user_id' => $user->id,
                'debit' => $request->amount,
                'credit' => 0,
                'description' => "Withdraw {$request->amount} taka.",
                'balance' =>  $user->balance,
            ]);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => "Your withdraw is pending."
        ]);





    }
}
