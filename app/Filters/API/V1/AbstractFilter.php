<?php

namespace App\Filters\API\V1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class AbstractFilter
{
    protected Request $request;

    public function __construct(
        Request $request,
    )
    {
        $this->request = $request;
    }

    abstract public function apply(Builder $query): Builder;
}
