<?php
include("CONFIG\db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // No encriptar la contraseña

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $password);
    
    if ($stmt->execute()) {
        echo "<p class='success-message'>Registro exitoso. <a href='auth\login.php'>Iniciar sesión</a></p>";
    } else {
        echo "<p class='error-message'>Error: " . $stmt->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="..\components\css\styles-register.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <div class="form-container">
        <h1>Registrarse</h1>
        <form method="post">
            <input type="text" name="nombre" placeholder="Nombre" class="form-input" required><br>
            <input type="email" name="email" placeholder="Correo electrónico" class="form-input" required><br>
            <input type="password" name="password" placeholder="Contraseña" class="form-input" required><br>
            <button type="submit" class="form-button">Registrarse</button>
            <p class="login-link">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
        </form>
    </div>
</body>
</html>
