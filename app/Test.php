<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Category;
use Question;

class Test extends Model
{
    public function Category()
    {
        return $this->hasMany('App\Category');
    }

    public function Question()
    {
        return $this->belongsTo('App\Question');
    }
}
