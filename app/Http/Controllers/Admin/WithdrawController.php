<?php

namespace App\Http\Controllers\Admin;

use App\Enum\WithdrawEnum;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraws = Withdraw::paginate();
        return view('admin.withdraw.index', compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $withdraw = Withdraw::firstWhere('id', $id);
        $update = $withdraw->update([
            'status' => $request->status,
        ]);

        return redirect()->route('withdraw.index');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Withdraw::firstWhere('id', $id)->delete();
        return redirect()->route('withdraw.index');
    }
}
