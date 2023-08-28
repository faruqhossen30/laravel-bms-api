<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AutoOption;
use App\Models\AutoQuestion;
use App\Models\Game;
use Illuminate\Http\Request;

class AutoquestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = AutoQuestion::orderBy('id','desc')->paginate();
        return view('admin.autoquestion.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::get();
        return view('admin.autoquestion.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title' => 'required',
            'game_id' => 'required',
            'status' => 'required',

            'option.*.name' => 'required',
            'option.*.bet_rate' => 'required'
        ]);

        $game = Game::firstWhere('id', $request->game_id);

       $question = AutoQuestion::create([
            'title' => $request->title,
            'game_id' => $request->game_id,
            'game_name' => $game->name,
            'status' => $request->status,
        ]);

        foreach ($request->option as $key => $value) {
            AutoOption::create([
                'auto_question_id' => $question->id,
                'title' => $value['name'],
                'bet_rate' => $value['bet_rate'],
                'status' => $value['status']
            ]);
        }

        return redirect()->route('autoquestion.index');
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
        $question = AutoQuestion::with('options')->firstWhere('id',$id);
        // return $question;
        return view('admin.autoquestion.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $games = Game::get();
        $question = AutoQuestion::with('options')->firstWhere('id', $id);
        // return $question;
        return view('admin.autoquestion.edit', compact('games','question'));
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
        $request->validate([
            'title' => 'required',
            'game_id' => 'required',
            'status' => 'required',
            'option.*.name' => 'required',
            'option.*.bet_rate' => 'required'
        ]);

       $update = AutoQuestion::firstWhere('id', $id)->update([
            'title' => $request->title,
            'game_id' => $request->game_id,
            'game_name' => 'some',
            'status' => $request->status,
        ]);

        if($update){
            AutoOption::where('auto_question_id', $id)->delete();
            foreach ($request->option as $key => $value) {
                AutoOption::create([
                    'auto_question_id' => $id,
                    'title' => $value['name'],
                    'bet_rate' => $value['bet_rate'],
                    'status' => $value['status']
                ]);
            }
        }


        return redirect()->route('autoquestion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
