<?php

$config = require 'config.php';
$db = new Database($config['database'], 'saleem', 'password');

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetch();

$heading = "The Note: " . $note['id'];

//dd($_GET['id']);
require "views/note.view.php";