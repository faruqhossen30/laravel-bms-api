<?php

namespace App\Http\Controllers\Admin\Bet;

use App\Http\Controllers\Controller;
use App\Models\Bet;
use Illuminate\Http\Request;

class BetlistController extends Controller
{
    public function index($id)
    {
        $bets = Bet::with('user')->where('option_id', $id)->paginate();
        return view('admin.bet.index', compact('bets'));
    }
}
