<?php

namespace App\Modules\Patterns\Builder;

abstract class AbstractBuilder
{
    public function getInstance()
    {
        return new static();
    }
}
