<?php
// Connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workshop2";

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capture the data sent by the form
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Crear la consulta SQL para insertar los datos
$sql = "INSERT INTO usuarios (name, lastname, phone, email) VALUES ('$name', '$lastname', '$phone', '$email')";

// Ejecutar la consulta y verificar si tuvo éxito
if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>



