<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserID = 1;

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserID);

$db->query('DELETE FROM notes where id = :id', [
    'id' => $_GET['id'],
]);

header('location: /notes');
exit();
