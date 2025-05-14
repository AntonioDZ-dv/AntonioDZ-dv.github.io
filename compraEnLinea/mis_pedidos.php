<?php
session_start();
include("negocios_db.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION["user_id"])) {
    die("Debes iniciar sesión para ver tus pedidos. <a href='login.php'>Inicia sesión</a>");
}

$usuario_id = $_SESSION["user_id"];
$sql = "SELECT p.id, r.nombre, p.cantidad, p.direccion, p.fecha_pedido FROM pedidos p
        JOIN ramos r ON p.ramo_id = r.id
        WHERE p.usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Mis Pedidos</h1>
    <table>
        <tr>
            <th>ID Pedido</th>
            <th>Ramo</th>
            <th>Cantidad</th>
            <th>Dirección</th>
            <th>Fecha</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["cantidad"]; ?></td>
                <td><?php echo $row["direccion"]; ?></td>
                <td><?php echo $row["fecha_pedido"]; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
