<?php

namespace App\Http\Controllers;

use App\Survey;
use App\UserSurvey;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if($user->verified != 1)
        {
            Auth::logout();
            return redirect('/do_login')->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        else{

            $user = Auth::user();

            $surveys = Survey::where('created_by','=',$user->id)->get();

            $results = 0;

            foreach ($surveys as $key)
            {
                $surveysConducted = UserSurvey::where('surveyID','=',$key->id)->get();

                $results += count($surveysConducted);
            }

            return view('dashboard', get_defined_vars());
        }
    }
}
