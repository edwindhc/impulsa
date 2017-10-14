<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Question;

class Answer extends Model
{
    public function Question()
    {
        return $this->hasMany('App\Question');
    }

}
