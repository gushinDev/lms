<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function resolvePagination(Builder $builder): Paginator
    {
        $page = (int)request()->get('page', 1) ?? 1;
        $perPage = (int)request()->get('per-page', 25) ?? 25;

        return new Paginator($builder, $perPage, $page);
    }
}
