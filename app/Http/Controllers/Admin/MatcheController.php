<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Matche;
use App\Models\Team;
use Illuminate\Http\Request;

class MatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Matche::with('questions')->with('questions.options')->paginate();
        // return $matches;
        return view('admin.matche.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Team::get();
        $games = Game::get();
        // return $countries;
        return view('admin.matche.create', compact('countries', 'games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_one' => 'required',
            'team_two' => 'required',
            'statement' => 'required',
            'date_time' => 'required',
            'game_id' => 'required',
            'auto_question' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'team_one' => $request->team_one,
            'team_two' => $request->team_two,
            'team_one_flag' => $request->team_one_flag,
            'team_two_flag' => $request->team_two_flag,
            'statement' => $request->statement,
            'date_time' => $request->date_time,
            'game_id' => $request->game_id,
            'note' => $request->note,
            'status' => $request->status,
        ];
        Matche::create($data);
        return redirect()->route('matche.index');
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
        $countries = Team::get();
        $games = Game::get();
        // return $countries;

        $match = Matche::firstWhere('id', $id);
        return view('admin.matche.edit',compact('match','countries', 'games'));
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
        $request->validate([
            'team_one' => 'required',
            'team_two' => 'required',
            'statement' => 'required',
            'date_time' => 'required',
            'game_id' => 'required',
            'auto_question' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'team_one' => $request->team_one,
            'team_two' => $request->team_two,
            'team_one_flag' => $request->team_one_flag,
            'team_two_flag' => $request->team_two_flag,
            'statement' => $request->statement,
            'date_time' => $request->date_time,
            'game_id' => $request->game_id,
            'note' => $request->note,
            'status' => $request->status,
        ];
        Matche::create($data);
        return redirect()->route('matche.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matche::firstWhere('id',$id)->delete();
        return redirect()->route('matche.index');
    }
}
