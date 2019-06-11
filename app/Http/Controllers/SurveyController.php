<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail;
use App\Question;
use App\Survey;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ShareSurvey;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $surveys = Survey::where('created_by','=',$user->id)->with('question')->get();

        return view('survey.list', get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $surveys = Survey::with('question')->get();

        return view('survey.all_surveys', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSurvey = new Survey();
        $newSurvey->title = $request['title'];
        $newSurvey->description = $request['description'];
        if($request['time'] != null)
        {
            $newSurvey->time = $request['time'];
        }
        else{
            $newSurvey->time = 0;
        }
        $newSurvey->key = Str::random();
        $newSurvey->created_by = Auth::user()->id;
        $newSurvey->save();

        return redirect('/show_survey/'.$newSurvey->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::where('id','=',$id)->with('question')->first();

        $questions = Question::where('survey_id','=',$survey->id)->with('answer')->get();

        return view('survey.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $survey = Survey::where('id','=',$id)->first();

        return view('survey.edit',get_defined_vars());
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
        $survey = Survey::where('id','=',$id)->first();

        $survey->title = $request['title'];
        $survey->description = $request['description'];
        $survey->time = $request['time'];
        $survey->save();

        return redirect('/survey_list')->with('success', "Survey successfully edited.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = Survey::where('id','=',$id)->first();
        $survey->delete();

        return redirect('/survey_list')->with('success', "Survey successfully deleted.");
    }

    /**
     * Share survey by email.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function share($id, Request $request)
    {
        $survey = Survey::where('id','=',$id)->first();

        $user = User::where('id','=',Auth::user()->id)->first();

        Mail::to($request->shareEmail)->send(new ShareSurvey($survey,$user));

        return "sent";
    }

    /**
     * Conduct survey
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function survey($key)
    {
        $survey = Survey::where('key','=',$key)->with('question')->first();

        $questions = Question::where('survey_id','=',$survey->id)->with('answer')->get();

        return view('survey.conduct',get_defined_vars());
    }

    public function getSurveys($key)
    {
        $survey = Survey::where('id','=',$key)->with('question')->first();

        $questions = Question::where('survey_id','=',$survey->id)->get();

        return response()->json($questions);
    }
}
