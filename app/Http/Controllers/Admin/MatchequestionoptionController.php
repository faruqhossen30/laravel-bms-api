<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionOption;
use Illuminate\Http\Request;

class MatchequestionoptionController extends Controller
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
    public function create(Request $request, $matche_id, $question_id)
    {
        $matche_id = $request->matche_id;
        $question_id = $request->question_id;

        // return [
        //     'matche_id' => $request->matche_id,
        //     'question_id' => $request->question_id
        // ];

        return view('admin.questionoption.create', compact('matche_id', 'question_id'));
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
            'matche_question_id' => 'required',
            'title' => 'required',
            'bet_rate' => 'required',
            'status' => 'required',
        ]);

        QuestionOption::create([
            'matche_id' => $request->matche_id,
            'matche_question_id' => $request->matche_question_id,
            'title' => $request->title,
            'bet_rate' => $request->bet_rate,
            'status' => $request->status,
        ]);

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
        //
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
