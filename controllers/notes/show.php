<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserID = 1;

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserID);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note,
]);
