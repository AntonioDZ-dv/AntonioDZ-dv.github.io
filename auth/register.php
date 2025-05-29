<?php
include(__DIR__ . '/../CONFIG/db.php');

$formVisible = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // No encriptar la contraseña

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $password);
    
    if ($stmt->execute()) {
        $message = "<p class='success-message'>Registro exitoso. <a href='login.php'>Iniciar sesión</a></p>";
        $formVisible = false;
    } else {
        $message = "<p class='error-message'>Error: " . $stmt->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="..\components\css\styles-register.css">
</head>
<body>
    <div class="form-container">
        <h1 class="business-title">Laura Creation's</h1>
        <?php if (isset($message)) echo $message; ?>
        <?php if ($formVisible): ?>
        <h2 class="register-title">Crea tu cuenta</h2>     
        <form method="post">
            <label for="nombre" class="label-input">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Antonio" class="form-input" required><br>
            
            <label for="email" class="label-input">Correo electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@gmail.com" class="form-input" required><br>
            
            <label for="password" class="label-input">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="************" class="form-input" required><br>
            
            <button type="submit" class="form-button">Registrarse</button>
            <p class="login-link"><a href="login.php">¿Ya tienes una cuenta?</a></p>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>

