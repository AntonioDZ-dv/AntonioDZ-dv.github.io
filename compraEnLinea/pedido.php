<?php
session_start();
include("negocios_db.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION["user_id"])) {
    die("Debes iniciar sesión para realizar un pedido. <a href='login.php'>Inicia sesión</a>");
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION["user_id"];
    $ramo_id = $_POST["ramo_id"];
    $cantidad = $_POST["cantidad"];
    $direccion = $_POST["direccion"];

    // Insertar el pedido en la base de datos
    $sql = "INSERT INTO pedidos (usuario_id, ramo_id, cantidad, direccion) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmt->bind_param("iiis", $usuario_id, $ramo_id, $cantidad, $direccion);

    if ($stmt->execute()) {
        echo "<p class='success-message'>Pedido realizado exitosamente.</p>";
    } else {
        echo "<p class='error-message'>Error al realizar el pedido: " . $stmt->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Realizar Pedido</h1>
    <form method="POST" action="pedido.php">
        <label for="ramo_id">Selecciona el ramo:</label>
        <select name="ramo_id" id="ramo_id" required>
            <option value="1">Ramo de Rosas</option>
            <option value="2">Ramo de Tulipanes</option>
            <option value="3">Ramo Mixto</option>
            <!-- Agrega más opciones según tus ramos disponibles -->
        </select>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required>

        <label for="direccion">Dirección de envío:</label>
        <input type="text" name="direccion" id="direccion" required>

        <button type="submit">Realizar Pedido</button>
    </form>
</body>
</html>
