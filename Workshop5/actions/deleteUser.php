<?php
  include('utils/functions.php');
  session_start();

  // Verificar si el usuario es Admin
  if (!isset($_SESSION['user']) || $_SESSION['user']['type'] !== 'Admin') {
    header('Location: users.php');
    exit();
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteUser($id)) {
      header('Location: users.php?success=deleted');
    } else {
      header('Location: users.php?error=delete_failed');
    }
  } else {
    header('Location: users.php');
  }
?>
