<?php
  require('../utils/functions.php');

  if($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authenticate($username, $password);

    if($user) {
      session_start();
      $_SESSION['user'] = $user;
      header('Location: ../users.php');
    } else {
      header('Location: ../index.php?error=login');
    }
  }
