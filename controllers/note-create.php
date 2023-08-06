<?php


$config = require 'config.php';
$db = new Database($config['database'], 'saleem', 'password');
$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('INSERT INTO notes(note,user_id) VALUES(:note, :user_id)',  [
        'note' => $_POST['note'],
        'user_id' => 1
    ]);
}

require 'views/note-create.view.php';