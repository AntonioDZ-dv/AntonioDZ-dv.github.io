<?php
// Configuración de conexión a la base de datos
$host = "localhost"; // Dirección del servidor
$user = "root"; // Usuario de la base de datos
$pass = "123456789"; // Contraseña del usuario (vacía por defecto en XAMPP)
$dbname = "negocio_ramos"; // Nombre de la base de datos

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
