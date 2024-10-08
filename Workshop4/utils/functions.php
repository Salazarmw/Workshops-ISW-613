<?php

function getConnection(): bool|mysqli
{
  $connection = mysqli_connect('localhost:3306', 'root', '', 'workshop4');
  return $connection;
}

/**
 *  Gets the provinces from the database
 */
function getProvinces(): array
{
  // Get the connection
  $connection = getConnection();

  // Check if the connection is successful
  if (!$connection) {
    return [];
  }

  // Query to select all provinces
  $query = "SELECT id, name FROM provinces";
  $result = mysqli_query($connection, $query);

  // Array to store the results
  $provinces = [];

  // Loop through the results and add them to the array
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $provinces[$row['id']] = $row['name'];
    }
  }

  // Close the connection
  mysqli_close($connection);

  return $provinces;
}

/**
 * Saves a specific user into the database
 */
function saveUser($user): bool
{
  $firstName = $user['firstName'];
  $lastName = $user['lastName'];
  $username = $user['email'];
  $province_id = $user['province_id'];
  $password = md5($user['password']);
  $type = $user['type'];

  $sql = "INSERT INTO users (name, lastname, username, province_id, password, type) 
          VALUES('$firstName', '$lastName', '$username', '$province_id', '$password', '$type')";

  try {
    $conn = getConnection();
    mysqli_query($conn, $sql);
  } catch (Exception $e) {
    echo $e->getMessage();
    return false;
  }

  return true;
}

/**
 * Gets users from the database
 */
function getUsers(): array
{
  // Get the connection to the database
  $connection = getConnection();

  // Check if the connection is successful
  if (!$connection) {
    return [];
  }

  // Query to get the users and join with the provinces table
  $query = "
        SELECT u.id, u.name, u.lastname, u.username
        FROM users u
    ";
  $result = mysqli_query($connection, $query);

  // Array to store users
  $users = [];

  // If there are results, they are stored in the array
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $users[] = $row;
    }
  }

  // Close the connection
  mysqli_close($connection);

  return $users;
}

/**
 * Get one specific student from the database
 *
 * @id Id of the student
 */
function authenticate($username, $password): bool|array|null
{
  $conn = getConnection();

  $hashedPassword = md5($password);

  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $hashedPassword);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $user;
  } else {
    $stmt->close();
    $conn->close();
    return null;
  }
}

function deleteUser($id): bool
{
  $connection = getConnection();
  
  if (!$connection) {
    return false;
  }

  $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
  $stmt->bind_param("i", $id);
  $success = $stmt->execute();
  
  $stmt->close();
  $connection->close();

  return $success;
}

function getUserById($id): array|null
{
  $connection = getConnection();
  
  if (!$connection) {
    return null;
  }

  $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  
  $stmt->close();
  $connection->close();

  return $user;
}

function updateUser($id, $userData): bool
{
  $connection = getConnection();
  
  if (!$connection) {
    return false;
  }

  $stmt = $connection->prepare("UPDATE users SET name = ?, lastname = ?, username = ?, type = ? WHERE id = ?");
  $stmt->bind_param("sssii", $userData['name'], $userData['lastname'], $userData['username'], $userData['type'], $id);
  
  $success = $stmt->execute();
  
  $stmt->close();
  $connection->close();

  return $success;
}
