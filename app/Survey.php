<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function surveyUser()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function question()
    {
        return $this->hasMany('App\Question');
    }
}
