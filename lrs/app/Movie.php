<?php

namespace App;

use MongoDB\Laravel\Eloquent\Model;
class Movie extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['name'];
}
