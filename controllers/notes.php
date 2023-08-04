<?php

$config = require 'config.php';
$db = new Database($config['database'], 'saleem', 'password');

$heading = 'My Notes';

$notes = $db->query('select * from notes where user_id = 7')->fetchAll();
//dd($notes);
require "views/notes.view.php";