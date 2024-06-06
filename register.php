<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Colores";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$gmail = $_POST['gmail'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];

$sql = "INSERT INTO Rojo (nombre, apellido, gmail, telefono, password) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssis", $nombre, $apellido, $gmail, $telefono, $password);

if ($stmt->execute()) {
    echo "Registro exitoso. <a href='login.html'>Iniciar sesión</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
