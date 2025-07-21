<?php
session_start();//variables de sesion
$usuario="";
$contra="";

    if(!empty($_SESSION['usuNombre']) && !empty($_SESSION['tipRol']))
    {
        $usuario=$_SESSION['usuNombre'];
        $rol=$_SESSION['tipRol'];
    }
    $datos=array();
    $cliente=new SoapClient(null, array('uri'=>'http://localhost/','location'=>'https://upmhproyect2024.000webhostapp.com/ServiciosWeb/servicioweb.php'));
    $datos=$cliente->ListarItaliana();
     
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
                    <a href="#" class="fas fa-heart"></a>
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
     <section class="inicio-catI">
        <div class="content-inicioCI">
            <p>Elegiste la categoria de recetas </p>
            <h3>Italianas</h3>
        </div>
  
     </section>
     <br>
     <br>
     <h1 class="title">RECETAS</h1>
    
      <table class="content-table">
        <thead>
        <tr>
            <td><b>Clave</b></td>
            <td><b>Usuario</b></td>
            <td><b>Categoria</b></td>
            <td><b>Titulo</b></td>
            <td><b>Descripcion</b></td>
            <td><b>Imagen</b></td>
            <td><b>Estatus</b></td>
        </tr>
        <?php 
            for ($rr = 0; $rr < count($datos); $rr++) { 
                echo '<tr align="center">';
                echo '<td>'.$datos[$rr]["ID"].'</td>';
                echo '<td>'.$datos[$rr]["Usuario"].'</td>';
                echo '<td>'.$datos[$rr]["Categoria"].'</td>';
                echo '<td>'.$datos[$rr]["Titulo"].'</td>';
                echo '<td>'.$datos[$rr]["Descripcion"].'</td>';
                echo '<td><img src="/SitioWeb/'.$datos[$rr]["Imagen"].'" alt="Imagen de receta" style="max-width: 200px; max-height: 200px;"></td>';
                echo '<td>'.$datos[$rr]["Estatus"].'</td>';
                
                echo '</tr>';
                                

            }
        ?>

        </tbody>
      </table>
    <br>
    <br>
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
                <li><a href="InicioR.html">Inicio</a></li>
                <li><a href="nosotros.html">Nosotros</a></li>
                <li><a href="Recetas.html">Recetas</a></li>
                <li><a href="Contacto.html">Contacto</a></li>

            </ul>
            </div>
            <div class="footerbottom">
            <p>Copyright &copy;2024; Designed by <span class="designer">Development Lake</span></p>
            </div>
    </footer>
     <script src="script.js"></script>
</body>
</html>