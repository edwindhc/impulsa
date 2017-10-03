<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Test;
class Category extends Model
{
    protected $fillable = [
        'title',
    ];

    public function Test()
    {
        return $this->belongsTo('App\Test');
    }
}
