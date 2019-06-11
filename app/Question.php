<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function questionSurvey()
    {
        return $this->belongsTo('App\Survey', 'survey_id');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }
}
