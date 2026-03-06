<?php

// :: is scope resolution  operator. That give you access to a static or a constant that was define on the class.

$config = require('config.php');
$db = new Database($config['database']);


$heading = 'My Notes';

$notes = $db->query('select * from notes where user_id = 1')->get();

require "views/notes/index.view.php";