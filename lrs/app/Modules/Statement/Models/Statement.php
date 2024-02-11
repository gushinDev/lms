<?php

namespace App\Modules\Statement\Models;

use Database\Factories\StatementFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';

    protected $guarded = [];
    protected $table = 'statements';
    protected $primaryKey = '_id';

    protected static function newFactory(): StatementFactory
    {
        return Statement::newFactory();
    }
}
