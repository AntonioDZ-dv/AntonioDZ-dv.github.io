<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Laura's Creations</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../components/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../components/css/font-more-Products.css">
    <style>
    /* SOLO para moreProducts.php */
    .more-products-body .logo-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .more-products-body .nav-user-group {
        display: flex;
        align-items: center;
        gap: 18px; /* Espacio entre botón e icono */
    }
    </style>
</head>
<body class="more-products-body">

    <header class="header">
        <div class="top-bar">
            <p>Bienvenido a la tienda en línea de Laura's Creations</p>
            <div class="language-currency">
                <span>Idioma: Español</span>
                <span>Moneda: MXN</span>
            </div>
        </div>
        <div class="logo-nav">
            <h1 class="logo">Laura's Creations</h1>
            <div class="nav-user-group">
                <nav>
                    <ul class="nav-links">
                        <li><a href="..\index.php">Inicio</a></li>
                    </ul>
                </nav>
                <div class="user-actions">
                    <?php if (isset($_SESSION["user_id"])): ?>
                        <a href="..\auth\logout.php">Cerrar sesión</a>
                    <?php else: ?>
                        <div class="user-menu">
                            <button id="userIcon" class="user-icon-btn" aria-label="Menú de usuario">
                                <i class="fa-solid fa-user fa-3x"></i>
                            </button>
                            <div id="dropdownMenu" class="dropdown-menu">
                                <a href="..\auth\login.php">Iniciar sesión</a>
                                <a href="..\auth\register.php">Registrarse</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
<?php

$precios = [
    207, 1279, 480, 360, 300, 534, 180, 
    188, 488, 1360, 500, 40, 288, 870, 
    194, 624, 180, 180, 179,];

$descripciones = [
    "Eterno Cumpleaños",
    "Promesa de Amor",
    "Luz de Gratitud",
    "Brisa de Primavera",
    "Dulce Encuentro",
    "Rosa Celestial",
    "Amistad que Florece",
    "Romance Dorado",
    "Ternura Eterna ",
    "Corazón Carmesí",
    "Sueño de Quince ",
    "Amor Infinito",
    "Día Radiante",
    "Besos de Rosa",
    "Mil Gracias",
    "Ilusión Púrpura",
    "Sol de Ocaso",
    "Magia de Tarde",
    "Alma de Fiesta",
    
];
?>
    
<main class="main-content">
    <section class="product-gallery">
        <h2>Galería de Productos</h2>
        <div class="product-grid">
            <?php for ($i = 1; $i <= count($precios); $i++): ?>
            <div class="product">
                <img src="..\components\images\ramo<?php echo $i; ?>.jpeg" alt="Producto <?php echo $i; ?>">
                <p class="descripcion"><?php echo $descripciones[$i - 1]; ?></p>
                <p class="precio">$<?php echo $precios[$i - 1]; ?>.00</p>
            </div>
            <?php endfor; ?>
        </div>
    </section>
</main>

<footer class="footer">
    <p>&copy; 2025 Laura's Creations. Todos los derechos reservados.</p>
</footer>
<script src="..\components\js\script.js"></script>
</body>
</html>
