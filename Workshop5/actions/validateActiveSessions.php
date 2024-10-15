<?php
require('../utils/functions.php');

if ($argc != 2) {
    echo "Usage: php validateActiveSessions.php <hours>\n";
    exit(1);
}

$hours = (int)$argv[1];

if ($hours <= 0) {
    echo "Error: The number of hours must be greater than 0.\n";
    exit(1);
}

$conn = getConnection();
$query = "SELECT id, username, last_login_datetime FROM users WHERE status = 'active'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $currentDateTime = new DateTime();

    while ($row = $result->fetch_assoc()) {
        $lastLogin = $row['last_login_datetime'];

        // Check if last_login_datetime is null (user has never logged in)
        if (empty($lastLogin)) {
            continue;
        }

        $lastLoginDateTime = new DateTime($lastLogin);
        $interval = $currentDateTime->diff($lastLoginDateTime);

        // Convert interval to hours
        $hoursSinceLastLogin = $interval->h + ($interval->days * 24);

        if ($hoursSinceLastLogin > $hours) {
            // If more than the indicated hours have passed, mark the user as "inactive"
            $updateQuery = $conn->prepare("UPDATE users SET status = 'inactive' WHERE id = ?");
            $updateQuery->bind_param("i", $row['id']);
            $updateQuery->execute();
            $updateQuery->close();

            echo "Usuario {$row['username']} marcado como 'inactive' (último login: {$lastLogin})\n";
        }
    }
} else {
    echo "No hay usuarios activos.\n";
}

$conn->close();
