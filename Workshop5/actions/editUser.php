<?php
include('../utils/functions.php');
$user = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = getUserById($id);
}

if ($_POST) {
    $updatedUser = [
        'name' => $_POST['firstName'],
        'lastname' => $_POST['lastName'],
        'username' => $_POST['email'],
        'province_id' => intval($_POST['province']),
        'type' => $_POST['type'],
    ];

    // If a new password is provided, update it
    if (!empty($_POST['password'])) {
        $updatedUser['password'] = md5($_POST['password']);
    }

    if (updateUser($id, $updatedUser)) {
        header('Location: ../users.php?success=updated');
    } else {
        header('Location: ../users.php?error=update_failed');
    }
}
