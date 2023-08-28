<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MatcheQuestion;
use App\Models\QuestionOption;
use Illuminate\Http\Request;

class MatchequestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $matche_id =  $request->id;
        return view('admin.matchequestion.create', compact('matche_id'));
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
            'matche_id' => 'required',
            'title' => 'required',
            'status' => 'required',
        ]);
       $question = MatcheQuestion::create([
            'matche_id' => $request->matche_id,
            'title' => $request->title,
            'is_hide' => 0,
            'status' => $request->status,
        ]);

        // foreach ($request->option as $key => $value) {
        //     QuestionOption::create([
        //         'matche_id' => $question->matche_id,
        //         'matche_question_id' => $question->id,
        //         'title' => $value['name'],
        //         'bet_rate' => $value['bet_rate'],
        //         'status' => $value['status']
        //     ]);
        // }

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
        return view('admin.matchequestion.create', compact('matche_id'));
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
            'title'=>'required'
        ]);

        MatcheQuestion::firstWhere('id',$id)->update([
            'title'=>$request->title
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MatcheQuestion::firstWhere('id',$id)->delete();
        return redirect()->route('matche.index');
        // return 'matchequestion.destroy';
    }
    public function stopStart($id)
    {
        $matchQuestion = MatcheQuestion::firstWhere('id', $id);
        //    $check =  $match->status;

            $update = $matchQuestion->update([
                'is_hide' =>!$matchQuestion->is_hide,
            ]);

            return redirect()->route('matche.index');
    }
}
