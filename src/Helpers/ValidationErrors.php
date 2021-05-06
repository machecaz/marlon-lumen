<?php

namespace Marlon\Lumen\Helpers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ValidationErrors
{
    private $validator;

    public function __construct()
    {
        $this->validator = Validator::make([], []);
    }

    public function add($field, $error)
    {
        $this->validator->errors()->add($field, $error);
    }

    public function throw()
    {
        throw new ValidationException($this->validator);
    }
}
