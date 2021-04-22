<?php

namespace Marlon\Lumen\Traits;

use Illuminate\Contracts\Support\Arrayable;

trait ObjectArrayable
{
    public function toArray() : array
    {
        $vars = get_object_vars($this);

        foreach($vars as $key => $value){
            if (is_a($vars[$key], Arrayable::class)) {
                $vars[$key] = $vars[$key]->toArray();
            }
        }

        return $vars;
    }
}
