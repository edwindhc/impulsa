<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Question;
use Test;

class Answer extends Model
{
    public function Question()
    {
        return $this->hasMany('App\Question');
    }
    public function Test()
    {
        return $this->hasMany('App\Test');
    }

}
