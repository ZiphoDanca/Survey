<?php

namespace App\Http\Controllers;

use App\Survey;
use App\SurveyConduct;
use App\UserSurvey;
use Illuminate\Http\Request;

class SurveyConductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $survey = Survey::where('id','=',$id)->first();

        $surveys = UserSurvey::where('surveyID','=',$id)->get();

        return view('survey.view_results',get_defined_vars());
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
        $userSurveyExist = UserSurvey::where('ip','=',$request['ip'])
            ->where('surveyID','=',$request['surveyID'])
            ->first();

        $newSurveyConduct = new SurveyConduct();
        $newSurveyConduct->userSurveyId = $userSurveyExist->id;
        $newSurveyConduct->question = $request['question'];
        $newSurveyConduct->answer = $request['answer'];
        $newSurveyConduct->save();

        return "okay";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SurveyConduct  $surveyConduct
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyConduct $surveyConduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SurveyConduct  $surveyConduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyConduct $surveyConduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SurveyConduct  $surveyConduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyConduct $surveyConduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SurveyConduct  $surveyConduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyConduct $surveyConduct)
    {
        //
    }
}
