<?php

// display the form

require_once 'DBBlackbox.php';
require_once 'Album.php';
require_once 'Session.php';

$success_message = Session::instance()->get('success_message');
$errors          = Session::instance()->get('errors', []);


$id = $_GET['id'] ?? null;

if ($id) {
    // edit existing album
    $album = find($id, 'Album');

} else {
    // create a new album
    $album = new Album;
}


?>

<?php echo '<h1>Album</h1>' ?>

<?php if ($success_message) : ?>
    <div class="message message_success">
        <?= $success_message ?>
    </div>
<?php endif; ?>

<?php foreach ($errors as $error) : ?>
    <div class="message message_error">
        <?= $error ?>
    </div>
<?php endforeach; ?>

<?php if ($id) : ?>
    <form action="save.php?id=<?= $id ?>" method="post">
<?php else : ?>
    <form action="save.php" method="post">
<?php endif; ?>

    Title:<br>
    <input type="text" name="title" value="<?= $album->title ?>">
    <br>
    <br>

    Cover image:<br>
    <input type="text" name="cover_image" value="<?= $album->cover_image ?>">
    <br>
    <br>

    Author:<br>
    <input type="text" name="author" value="<?= $album->author ?>">
    <br>
    <br>

    Year of release:<br>
    <input type="year" name="year_of_release" value="<?= $album->year_of_release ?>">
    <br>
    <br>

    <button>Save</button>

</form>