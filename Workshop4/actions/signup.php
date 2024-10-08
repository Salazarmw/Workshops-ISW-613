<?php
require '../utils/functions.php';

if ($_POST && isset($_POST['firstName'])) {
  $user['firstName'] = $_POST['firstName'];
  $user['lastName'] = $_POST['lastName'];
  $user['email'] = $_POST['email'];
  $user['province_id'] = intval($_POST['province']);
  $user['password'] = $_POST['password'];
  $user['type'] = $_POST['type'];

  if (saveUser($user)) {
    header("Location: ../index.php");
  } else {
    header("Location: ../?error=Invalid user data");
  }
}

