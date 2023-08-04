<?php

$config = require 'config.php';
$db = new Database($config['database'], 'saleem', 'password');
$currentUserId = 6;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->fetch();


if (! $note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}
$heading = "Note: " . $note['id'];
//dd($_GET['id']);
require "views/note.view.php";