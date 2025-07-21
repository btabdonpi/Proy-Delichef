<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELICHEF</title>
    
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,100;1,200&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,100;1,200&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <div class="container-hero">
            <div class="container hero">
                <div class="container-logo">
                    <h1 class="logo"><a href="/">DeliChef</a></h1>
                    <i class="fa-solid fa-utensils"></i>
                </div>
                <div class="icons">
                    <div id="user-btn" class="fas fa-user"></div>
                 </div>
            </div>
        </div>
        <div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
                <u1 class="menu">
                    <li><a href="InicioRegistrado.php">Inicio</a></li>
                    <li><a href="nosotrosRe.php">Nosotros</a></li>
                    <li><a href="RecetasRe.php">Recetas</a></li>
                    <li><a href="ContactoRe.php">Contacto</a></li>
                    <li><a href="RegistrarRe.php">Subir Receta</a></li>
                    <li><a href="buscarRe.php">Buscar Receta</a></li>
                </u1>
            </nav>
        </div>

    </header>
    <header class="header">
 
        <section class="flex">
           <div class="profile">
             <p class="name">Mi perfil</p>
            <div class="flex">
               <a href="Perfil.html" class="btn">Mi perfil</a>
               <a href="logout.php" class="delete-btn">Cerrar Sesión</a>
            </div>
           </div>
     
        </section>
     
     </header>
     <section class="inicio">
        <div class="content-inicio">
            <p>Mejores recetas en </p>
            <h3>Delichef</h3>
            <a href="Recetas.html" class="btn">Ver recetas</a>
        </div>
     </section>
         <section class="general">
        <div class="general-content">
            <div class="general-txt">
                <h2>Pasta Alfredo </h2>
                <p>
                    ¡Bienvenidos a nuestra página! ¿Están listos para descubrir 
                    el secreto detrás de la exquisita pasta Alfredo? Sumérgete 
                    en el mundo de los sabores cremosos y reconfortantes con 
                    nuestra receta especial.
                    ¡Prepárate para deleitar tu paladar y sorprender a tus seres 
                    queridos con este clásico plato italiano!
                </p>
                <a href="VisualizarReU.html" class="btn-1">Saber más...</a>
            </div>
            <div class="general-img">
                <img src="imagenes/Pasta.png" alt="">
            </div>
        </div>
     </section>
     <section class="general">
        <div class="general-content">
            <div class="general-img">
                <img src="imagenes/Chiles.png" alt="">
            </div>
            <div class="general-txt">
                <h2>Chiles en nogada </h2>
                <p>¿Qué hace que los chiles en nogada sean tan especiales? 
                    Desde la cuidadosa selección de ingredientes frescos 
                    hasta los métodos de preparación que resaltan los sabores auténticos, 
                    te guiaremos en cada paso del camino para que puedas disfrutar de este
                    manjar mexicano en su máxima expresión.
                </p>
                <a href="#" class="btn-1">Saber más...</a>
            </div>
        </div>
     </section>
        <footer class="footer">
            <div class="footer-container">

            <div class="Sociales">
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
                <a href=""><i class="fa-brands fa-pinterest"></i></a>


            </div>

            </div>
            <div class="footernav">
            <ul>
                    <li><a href="InicioRegistrados.php">Inicio</a></li>
                    <li><a href="nosotrosRe.php">Nosotros</a></li>
                    <li><a href="RecetasRe.php">Recetas</a></li>
                    <li><a href="ContactoRe.php">Contacto</a></li>
                    <li><a href="buscarR.php">Buscar recetas</a></li>

            </ul>
            </div>
            <div class="footerbottom">
            <p>Copyright &copy;2024; Designed by <span class="designer">Development Lake</span></p>
            </div>
    </footer>
     <script src="script.js"></script>
</body>
</html>