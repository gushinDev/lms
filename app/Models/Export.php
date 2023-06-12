<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Export extends Model
{
    use HasFactory;

    protected $table = 'exports';
    protected $primaryKey = 'export_id';
    protected $guarded = ['export_id'];

}
