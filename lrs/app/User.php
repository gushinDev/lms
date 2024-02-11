<?php

namespace App;

use MongoDB\Laravel\Eloquent\Model;

class User extends Model
{
    protected $casts = ['birthday' => 'datetime'];
}
