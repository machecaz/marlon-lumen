<?php

namespace Marlon\Lumen\Traits;

use Illuminate\Contracts\Support\Arrayable;

trait ArrayObjectArrayable
{
    public function toArray(): array
    {
        $array = $this->getArrayCopy();
            
        foreach ($array as $key => $value) {
            if ($value instanceof Arrayable) {
                $array[$key] = $value->toArray();
            }
        }

        return $array;
    }
}
