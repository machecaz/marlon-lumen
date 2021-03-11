<?php

namespace Marlon\Lumen\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Validator;

class MarlonLumenProvider extends ServiceProvider
{
    $this->app->resolving(FormRequest::class, function ($req, $app) {
        $validator = Validator::make(
            request()->all(),
            $req->rules(),
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        if (count($validator->validated()) < count(request()->all())) {
            foreach (request()->all() as $key => $value) {
                if (!isset($validator->validated()[$key])) {
                    $validator->errors()->add(
                        $key,
                        'This field is not accepted from current request. Please remove it.'
                    );
                }
            }

            throw new ValidationException($validator);
        }

        $req->replace($validator->validated());
    });
}
