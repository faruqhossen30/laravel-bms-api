<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Label;
use App\Models\Matche;
use App\Models\Membership;
use App\Models\PaymentGateway;
use App\Models\User;
use Illuminate\Http\Request;

class ListapiController extends Controller
{
    public function clubList()
    {
        $clubs = User::where('is_club', true)->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $clubs
        ]);
    }

    public function paymentMethodList()
    {
        $methods = PaymentGateway::get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $methods
        ]);
    }

    public function matchList()
    {
        $matches = Matche::with('questions')->with('questions.options')->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $matches
        ]);
    }

    public function matchListByGameid($gameid)
    {
        $matches = Matche::with('questions')->with('questions.options')->where('game_id', $gameid)->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $matches
        ]);
    }

    public function gameList()
    {
       $games = Game::get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $games
        ]);
    }




}
