<?php

function getConnection(): bool|mysqli
{
  $connection = mysqli_connect('localhost:3306', 'root', '', 'workshop3');
  print_r(mysqli_connect_error());
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
 * Saves an specific user into the database
 */
function saveUser($user): bool
{
  $firstName = $user['firstName'];
  $lastName = $user['lastName'];
  $username = $user['email'];
  $province_id = $user['province'];
  $password = md5($user['password']);

  $sql = "INSERT INTO users (name, lastname, username, province_id, password) VALUES('$firstName', '$lastName', '$username', '$province_id', '$password')";

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
