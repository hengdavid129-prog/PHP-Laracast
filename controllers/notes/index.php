<?php

use Core\Database;

// :: is scope resolution  operator. That give you access to a static or a constant that was define on the class.

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 1')->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);