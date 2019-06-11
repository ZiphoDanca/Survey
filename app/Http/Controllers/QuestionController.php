<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        $question = new Question();
        $question->question = $request['question'];
        $question->survey_id = $request['surveyID'];
        $question->save();

        $answer = new Answer();
        $answer->answer = $request['answer1'];
        $answer->question_id = $question->id;
        $answer->save();

        if($request['answer2'] != null)
        {
            $answer = new Answer();
            $answer->answer = $request['answer2'];
            $answer->question_id = $question->id;
            $answer->save();
        }
        if($request['answer3'] != null)
        {
            $answer = new Answer();
            $answer->answer = $request['answer3'];
            $answer->question_id = $question->id;
            $answer->save();
        }
        if($request['answer4'] != null)
        {
            $answer = new Answer();
            $answer->answer = $request['answer4'];
            $answer->question_id = $question->id;
            $answer->save();
        }

        return redirect('/show_survey/'.$question->survey_id);
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
