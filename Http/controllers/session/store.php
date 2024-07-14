<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// Validate the form
$form = LoginForm::validate($attributes = [

    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

// Attempt to sign in
$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

// And if we're not signed in, throw an error
if (!$signedIn) {

    $form->error('email', 'No matching account found for that email address and password.')->throw();

}

// Otherwise, redirect to the home page
redirect('/');
