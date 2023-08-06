<?php

$config = require 'config.php';
$db = new Database($config['database'], 'saleem', 'password');
$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    if (strlen($_POST['note']) === 0) {
        $errors['note'] = 'A note is required';
    }

    if (strlen($_POST['note']) > 1000) {
        $errors['note'] = "The note can't be more than 1000 chars";
    }

    if(empty($errors)) {

        $db->query('INSERT INTO notes(note,user_id) VALUES(:note, :user_id)',  [
            'note' => $_POST['note'],
            'user_id' => 1
        ]);

    }
}

require 'views/note-create.view.php';