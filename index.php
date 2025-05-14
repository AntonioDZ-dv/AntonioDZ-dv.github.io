<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura's Creations</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="components\css\styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
</head>
<body>
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
            <nav>
                <ul class="nav-links">
                    <li><a href="ramos.php" class="active">Inicio</a></li>
                    <li><a href="#">Usuarios</a></li>
                    <li><a href="#">Social</a></li>
                </ul>
            </nav>

            <div class="user-actions">
                <?php if (isset($_SESSION["user_id"])): ?>
                <a href="auth\logout.php">Cerrar sesión</a>
                <?php else: ?>
                <!-- Ícono de usuario y menú desplegable SOLO si NO ha iniciado sesión -->
                <div class="user-menu">
                <button id="userIcon" class="user-icon-btn" aria-label="Menú de usuario">
                    <i class="fa-solid fa-user fa-3x"></i>
                </button>
            <div id="dropdownMenu" class="dropdown-menu">
                <a href="auth\login.php">Iniciar sesión</a>
            <a href="auth\register.php">Registrarse</a>
    </div>
</div>
        </div>
    <?php endif; ?>
</div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h2>Regalo para el Día de las Madres</h2>
            <p>Flores
                 para hacer sentir especial a mamá</p>
         
        </div>
    </section>
    <div class="carousel">
    <div class="carousel-images">
        <img src="components\images\ramo9.jpeg" alt="">
        <img src="components\images\ramo10.jpeg" alt="">
        <img src="components\images\ramo11.jpeg" alt="">
    </div>
</div>
    
   

    <section class="top-sellers">
        <h2>Top Sellers</h2>
        <div class="top-sellers-img">
            <img src="components\images\ramo1.jpeg" alt="ramo1">
            <img src="components\images\ramo2.jpeg" alt="flor_tela">
            <img src="components\images\ramo3.jpeg" alt="flor_tela">
        </div>
    </section>

    <section class="features">
        <div class="feature">
            <h3>Envío gratuito</h3>
            <p>Envío gratuito en todos los pedidos</p>
        </div>
        <div class="feature">
            <h3>Soporte 24/7</h3>
            <p>Soporte disponible las 24 horas del día</p>
        </div>
        <div class="feature">
            <h3>Devolución de dinero</h3>
            <p>30 días para devolución gratuita</p>
        </div>
        <div class="feature">
            <h3>Descuento en pedidos</h3>
            <p>Descuento en pedidos mayores a $15</p>
        </div>
    </section>

    <section class="new-products">
        <h2>Productos Nuevos</h2>
        <div class="product-grid">
            <div class="product">
                <img src="components\images\ramo4.jpeg" alt="Producto 1">
                <span class="product-details">
                    <p>Ramo de flores rosas</p>
                    <p>$60.00</p>
                </span>
                
            </div>
            <div class="product">
                <img src="components\images\ramo5.jpeg" alt="Producto 2">
                <span class="product-details">
                    <p>Ramo de flores rosas</p>
                    <p>$60.00</p>
                </span>
            </div>
            <div class="product">
                <img src="components\images\ramo6.jpeg" alt="Producto 3">
                <span class="product-details">
                    <p>Ramo de flores rosas</p>
                    <p>$60.00</p>
                </span>
            </div>
            <div class="product">
                <img src="components\images\ramo7.jpeg" alt="Producto 4">
                <span class="product-details">
                    <p>Ramo de flores rosas</p>
                    <p>$60.00</p>
                </span>
            </div>
        </div>
        <a href="..\pages\masProductos.php" class="btn">Ver más productos</a>
    </section>
    <section class="accesories">
        <h2>Accesorios extras</h2>  
        <h3>Peluches</h3>
        <div class="accesories-img">
            <img src="components\images\peluche1(osoGris).jpeg" >
            <img src="components\images\peluche2(koala).jpeg" >
            <img src="components\images\peluche3(cocodrilo).jpeg" >
            <img src="components\images\peluche4(venadoRosa).jpeg" >
            <img src="components\images\peluche5(venado).jpeg" >
            <img src="components\images\peluche6(dinosaurioRosa).jpeg" >
            <img src="components\images\peluche7(osoRojoVino).jpeg" >
            <img src="components\images\peluche8(ososChicos).jpeg" >
            <img src="components\images\accesorio(BirthdayQueen).jpeg" >
            
        </div>
    </section>

    <footer class="footer">
        <p> <span> <a href="https://www.facebook.com/people/Lauras-Creations/61572005057732/?mibextid=wwXIfr&rdid=0hZmeZw3vwuJltym&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F18wpDFayGi%2F%3Fmibextid%3DwwXIfr" class=""><i class="fab fa-facebook-f"></i></a></span>&copy; 2025 Laura's Creations. Todos los derechos reservados.</p>
       
    </footer>
    <script src="components\js\script.js"></script>
</body>
</html>