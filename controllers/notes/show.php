<?php

// :: is scope resolution  operator. That give you access to a static or a constant that was define on the class.
$config = require('config.php');
$db = new Database($config['database']);


$heading = 'Note';
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require "views/notes/show.view.php";