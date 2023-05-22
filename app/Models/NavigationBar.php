<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationBar extends Model
{
    use HasFactory;
    protected $table = 'navigation_bar';
    protected $primaryKey = 'navigation_bar_id';
    protected $fillable = [
        'menu_item_name',
        'order_number',
        'route_name'
    ];
}
