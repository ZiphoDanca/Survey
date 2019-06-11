<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/do_login','Auth\LoginController@doLogin')->name('login');

Route::get('/do_register','Auth\RegisterController@doRegister')->name('register');

Route::get('/conduct_survey/{key}','SurveyController@survey')->name('survey');

Route::get('/all_survey','SurveyController@all')->name('survey');

Route::get('/survey_result/{id}','UserSurveyController@show')->name('results');

Auth::routes();

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser')->name('verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/survey_list', 'SurveyController@index')->name('surveys');

Route::get('/create_survey','SurveyController@create')->name('create');

Route::post('/store_survey','SurveyController@store')->name('save-survey');

Route::get('/edit_survey/{id}','SurveyController@edit')->name('edit-survey');

Route::post('/edit_survey/{id}','SurveyController@update')->name('edit-survey');

Route::get('/delete_survey/{id}','SurveyController@destroy')->name('delete-survey');

Route::get('/show_survey/{id}','SurveyController@show')->name('show-survey');

Route::post('/share_survey/{id}','SurveyController@share')->name('share-survey');

Route::get('/getSurveyQuestion/{key}','SurveyController@getSurveys')->name('all_survey');

Route::post('/add_question', 'QuestionController@store')->name('question');

Route::group(['prefix' => 'api'], function() {

    Route::post('/survey_user', 'UserSurveyController@store')->name('save_survey_user');

    Route::post('/survey_conduct', 'SurveyConductController@store')->name('save_survey');
});

Route::get('/all_surveys_conducted/{id}','SurveyConductController@index')->name('surveys');

Route::get('/survey_result_/{id}','UserSurveyController@showResults')->name('results');

