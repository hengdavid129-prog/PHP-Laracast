<?php

use Core\Session;

$_SESSION = [];

view('session/create.view.php', [
    'errors' => Session::get('errors')
]);