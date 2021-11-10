<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    public function attributesToArray(): array
    {
        $attributes = [];

        foreach(parent::attributesToArray() as $attribute => $value) {
            $attributes[Str::camel($attribute)] = $value;
        }

        return $attributes;
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute(Str::snake($key), $value);
    }

    public function getAttribute($key)
    {
        return parent::getAttribute(Str::snake($key));
    }
}
