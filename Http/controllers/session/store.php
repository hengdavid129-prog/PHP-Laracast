<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// log in the user if the credentials match.

$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate($attribute = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signIn = (new Authenticator)->attempt(
    $attribute['email'], $attribute['password']
);

if (!$signIn) {
    $form->error(
        'email', 'No matching account found for that email address and password.')
    ->throw();
}

redirect('/');
