<?php

namespace Core;

class ValidationException extends \Exception  {

    public readonly array $errors;
    public readonly array $old;

    public static function throw($errors, $old) {
        
        $instance = new static('The given data was invalid.');

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }

}