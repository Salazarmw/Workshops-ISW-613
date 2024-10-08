<?php
include('../utils/functions.php');
session_start();

// Verificar si el usuario es Admin
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
?>

<?php require('../inc/header.php') ?>
<div class="container">
    <h2>Edit User</h2>
    <?php if ($user): ?>
        <form method="POST">
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
                    <?php foreach ($provinces as $id => $province): ?>
                        <option value="<?= $id ?>" <?= $user['province_id'] == $id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($province) ?>
                        </option>
                    <?php endforeach; ?>
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
<?php require('../inc/footer.php') ?>