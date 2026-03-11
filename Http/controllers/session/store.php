<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// log in the user if the credentials match.

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address and password');
}

return view('session/create.view.php', [
    'errors' => $form->errors()
]);
