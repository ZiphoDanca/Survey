<?php

namespace App\Http\Controllers;

use App\SurveyConduct;
use App\UserSurvey;
use Illuminate\Http\Request;

class UserSurveyController extends Controller
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
        $response = array();

        $userSurveyExist = UserSurvey::where('ip','=',$request['ip'])
            ->where('surveyID','=',$request['surveyID'])
            ->first();

        if($userSurveyExist == null)
        {
            $userSurvey = new UserSurvey();
            $userSurvey->surveyID = $request['surveyID'];
            $userSurvey->ip = $request['ip'];
            $userSurvey->save();

            $response['id'] = $userSurvey['id'];
            $response['status'] = "saved";
        }
        else{
            $response['id'] = $userSurveyExist['id'];
            $response['status'] = "error";
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserSurvey  $userSurvey
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userSurvey = UserSurvey::where('id','=',$id)->first();

        $survey = SurveyConduct::where('userSurveyId','=',$id)->get();

        return view('survey.results',get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserSurvey  $userSurvey
     * @return \Illuminate\Http\Response
     */
    public function showResults($id)
    {
        $userSurvey = UserSurvey::where('id','=',$id)->first();

        $survey = SurveyConduct::where('userSurveyId','=',$id)->get();

        return view('survey.view_results_1',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserSurvey  $userSurvey
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSurvey $userSurvey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserSurvey  $userSurvey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSurvey $userSurvey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSurvey  $userSurvey
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSurvey $userSurvey)
    {
        //
    }
}
