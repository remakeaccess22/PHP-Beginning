<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;


class LoginForm {

    protected $errors = [];

    public function __construct (public array $attributes) {

        if(!Validator::email($attributes['email'])) {
            $this->error('email', 'Please enter a valid email address.');
        }

        if(!Validator::string($attributes['password'])) {
            $this->error('password', 'Please enter a password.');
        }

    }

    public static function validate($attributes) {

        
        $instance = new static ($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    
    }

    public function throw() {

        ValidationException::throw($this->errors(), $this->attributes);


    }

    public function failed() {

        return count($this->errors);

    }

    public function errors() {

        return $this->errors;
    }

    public function error($email, $message) {
            
            $this->errors[$email] = $message;

            return $this;
    }

}