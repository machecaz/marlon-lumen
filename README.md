# Marlon Lumen

## Usage

1. Register provider into `bootstrap/app.php`:

    ```php
    $app->register(Marlon\Lumen\Providers\MarlonLumenServiceProvider::class);
    ```

2. Add ErrorHandler trait to `app/Exceptions/Handler.php`.

## Commands

1. make:request -> Create a FormRequest.
2. make:response -> Create a Responsable class.
3. run:test -> A shortcut command for run test using phpunit.

## Enums

This package use spatie/enum for enable enum feature (we are waiting for php 8.1 that will provides native enum).

- RoleEnum -> user roles.

## Helper classes

- Auth -> get values from marlon custom header (proxy will pass them).
- ValidationErrors -> a helper class for throw a ValidationException.

## Traits

- ArrayObjectArrayable -> implements a recursive "objects to array" method.
- ErrorHandler -> core class for handle ValidationException and return a 422 response with errors.
- ObjectArrayable -> implements a recursive "object to array" method for object.
