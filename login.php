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

$login = $_POST['login'];
$password = $_POST['password'];

if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM Rojo WHERE gmail = ? AND password = ?";
} else {
    $sql = "SELECT * FROM Rojo WHERE telefono = ? AND password = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $login, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: ContenidoExclusivo.html");
    exit();
} else {
    echo "Inicio de sesión fallido. Verifica tus datos e intenta nuevamente.";
}

$stmt->close();
$conn->close();
?>
