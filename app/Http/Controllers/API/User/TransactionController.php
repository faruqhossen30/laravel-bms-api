<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {

        $transctions = Transaction::where('user_id', $request->user()->id)->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $transctions
        ]);
    }
}
