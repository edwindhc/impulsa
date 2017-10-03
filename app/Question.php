<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Test;
use Answer;

class Question extends Model
{
    public function Test()
    {
        return $this->hasMany('App\Test');
    }

    public function Answer()
    {
        return $this->belongsTo('App\Answer');
    }
}
