<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserID = 1;

// find the corresponding note
$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

// authorize that the user is the owner of the note
authorize($note['user_id'] === $currentUserID);


// validate the form
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

//if no validation errors, update the record in the notes database table.
if (count($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

//Redirect users to the notes page
header('location: /notes');
die();
