<?php
include('utils/functions.php');
session_start();

// Check if the user is Admin
if (!isset($_SESSION['user']) || $_SESSION['user']['type'] !== 'Admin') {
    header('Location: ../users.php');
    exit();
}

$provinces = getProvinces();
$user = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = getUserById($id);
}
$error_msg = isset($_GET['error']) ? $_GET['error'] : '';
?>
<?php require('inc/header.php') ?>
<div class="container-fluid">
    <h2>Edit User</h2>
    <?php if ($user): ?>
        <form method="POST" action="actions/editUser.php">
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input id="first-name" class="form-control" type="text" name="firstName" value="<?= htmlspecialchars($user['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input id="last-name" class="form-control" type="text" name="lastName" value="<?= htmlspecialchars($user['lastname']) ?>" required>
            </div>
            <div class="form-group">
                <label for="province">Provincia</label>
                <select id="province" class="form-control" name="province">
                    <?php
                    foreach ($provinces as $id => $province) {
                        echo "<option value=$id>$province</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" class="form-control" type="text" name="email" value="<?= htmlspecialchars($user['username']) ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password (Leave blank to keep current password)</label>
                <input id="password" class="form-control" type="password" name="password">
            </div>
            <div class="form-group">
                <label for="type">Tipo de Usuario</label>
                <select id="type" class="form-control" name="type">
                    <option value="Admin" <?= $user['type'] == 'Admin' ? 'selected' : '' ?>>Administrador</option>
                    <option value="User" <?= $user['type'] == 'User' ? 'selected' : '' ?>>Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
</div>
<?php require('./inc/footer.php') ?>