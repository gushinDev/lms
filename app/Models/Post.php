<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property string $content
 */
class Post extends Model
{
    use HasFactory;

    public function getCutContent(): string
    {
        return Str::limit($this->content, 20, '...');
    }

    protected function duration(): Attribute
    {
        return Attribute::make(get: fn(string $value) => "$value min.");
    }

    public function users()
    {
        return $this->hasOneThrough();
    }
}
