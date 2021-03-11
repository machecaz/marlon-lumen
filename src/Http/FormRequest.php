<?php

namespace Marlon\Lumen\Http;

use Illuminate\Http\Request;

abstract class FormRequest extends Request
{
    abstract function rules(): array;

    public function getPerPage(): int 
    {
        return $this->per_page ?? 10;
    }
}