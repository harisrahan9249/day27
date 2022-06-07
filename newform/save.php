<?php

// handle the submission of the form

require_once 'DBBlackbox.php';
require_once 'Album.php';
require_once 'Session.php';


$id = $_GET['id'] ?? null;

if ($id) {
    // updating an existing album
    $album = find($id, 'Album');

} else {
    // inserting a new album
    $album = new Album;
}

// validate!
$valid = true; // everything is ok
$errors = []; // error messages

if (empty($_POST['title'])) {
    $valid = false;
    $errors[] = 'The title field is mandatory';
}

if (empty($_POST['author'])) {
    $valid = false;
    $errors[] = 'The author field is mandatory';
}

if (!empty($_POST['year_of_release'])
    && !is_numeric($_POST['year_of_release'])
) {
    $valid = false;
    $errors[] = 'The year of release must be a number';
}

if (!$valid) {
    // validation failed :-(

    // flash the error messages
    Session::instance()->flash('errors', $errors);

    // flash the (bad) request data

    // redirect back
    if ($id) {
        header('Location: edit.php?id=' . $id);
    } else {
        header('Location: edit.php');
    }
    exit(); // stop execution of the script
}


// update the data from the request
$album->title           = $_POST['title'] ?? $album->title;
$album->cover_image     = $_POST['cover_image'] ?? $album->cover_image;
$album->author          = $_POST['author'] ?? $album->author;
$album->year_of_release = $_POST['year_of_release'] ?? $album->year_of_release;

if ($id) {
    // update the existing record
    update($id, $album);
} else {
    // insert a new record and get the ID
    $id = insert($album);
}

Session::instance()->flash('success_message', 'Album successfully saved');

header('Location: edit.php?id=' . $id);