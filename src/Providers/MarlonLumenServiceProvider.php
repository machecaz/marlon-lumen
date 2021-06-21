<?php

namespace Marlon\Lumen\Providers;

use Marlon\Lumen\Http\FormRequest;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Marlon\Lumen\Console\Commands\RequestMakeCommand;
use Marlon\Lumen\Console\Commands\ResponseMakeCommand;
use Marlon\Lumen\Console\Commands\RunTestCommand;

class MarlonLumenServiceProvider extends ServiceProvider
{
    public function register() {
        //
    }

    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RunTestCommand::class,
                RequestMakeCommand::class,
                ResponseMakeCommand::class
            ]);
        }

        $this->app->resolving(FormRequest::class, function ($req, $app) {
            $validator = Validator::make(
                request()->all(),
                $req->rules(),
                $req->messages()
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
}
