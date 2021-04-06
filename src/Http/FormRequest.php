<?php

namespace Marlon\Lumen\Http;

use Illuminate\Http\Request;

abstract class FormRequest extends Request
{
    function messages(): array {
        return [];
    }

    abstract function rules(): array;

    public function getPerPage(): int 
    {
        return $this->per_page ?? 10;
    }
}