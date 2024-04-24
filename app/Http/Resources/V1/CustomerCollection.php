<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{

//    public static $wrap = null; // не работает с paginate, все равно выходит data ключ с массивами
    /**
     * Этот тип ресурса - коллекция - автоматом находит CustomerResource и забирает оттуда все необходимые поля что необходимо выводить
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
