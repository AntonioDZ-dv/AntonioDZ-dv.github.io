<?php
include(__DIR__ . '/../CONFIG/db.php');

session_start();

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Preparar la consulta SQL
    $sql = "SELECT id, nombre, password FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si el usuario existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre, $hashed_password);
        $stmt->fetch();

        // Verificar la contraseña sin encriptación
        if ($password === $hashed_password) {
            // Guardar datos en la sesión
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $nombre;

            // Redirigir a la pagina principal
            // header("Location: index.php");
            header("Location: ..\index.php");
            exit();
        } else {
            $error = "Credenciales incorrectas.";
        }
    } else {
        $error = "El usuario no existe.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../components/css/styles-login.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <!-- Mostrar errores si existen -->
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <div class="login-container">
        <form method="post">
            <h1 class="business-title">Laura Creation's <p>
                <a class="facebook-logo" href="https://www.facebook.com/people/Lauras-Creations/61572005057732/?mibextid=wwXIfr&rdid=0hZmeZw3vwuJltym&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F18wpDFayGi%2F%3Fmibextid%3DwwXIfr" class="" target="_blank" rel="noopener">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" style="width:32px;height:32px;vertical-align:middle;">
                </a>  
            </p></h1>
            
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
