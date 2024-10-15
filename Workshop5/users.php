<?php
  include('utils/functions.php');
  session_start();

  if (!isset($_SESSION['user'])) {
    header('Location: ./index.php');
    exit();
  }

  $currentUser = $_SESSION['user'];

  $users = getUsers();
?>
<?php require('inc/header.php')?>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">Users</h1>
      <p class="lead">List of users</p>
      <hr class="my-4">
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th>Province</th>
          <?php if ($currentUser['type'] == 'Admin'): ?>
            <th>Actions</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
          <td><?= htmlspecialchars($user['name']) ?></td>
          <td><?= htmlspecialchars($user['lastname']) ?></td>
          <td><?= htmlspecialchars($user['username']) ?></td>
          <td><?= htmlspecialchars($user['province_id']) ?></td>
          <?php if ($currentUser['type'] == 'Admin'): ?>
            <td>
              <a href="./edit.php?id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="./actions/deleteUser.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
            </td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php require('inc/footer.php') ?>
