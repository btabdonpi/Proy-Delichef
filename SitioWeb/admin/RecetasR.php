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
    $datos=$cliente->ListarLinea();
    
        if (isset($_POST['borrar']) && isset($_POST['id_receta'])) {
        $id_receta = $_POST['id_receta'];
        $cliente = new SoapClient(null, array('uri'=>'http://localhost/', 'location'=>'https://upmhproyect2024.000webhostapp.com/ServiciosWeb/servicioweb.php'));
        $respuesta = $cliente->EliminarRecetas($id_receta); 
        if ($respuesta != 'OK') {
            echo 'Receta borrada correctamente.';
        } else {
            echo 'Error al borrar la receta.';
        }
    } 

     
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas Pendientes </title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
 
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
 
    <link rel="stylesheet" href="estiloAd.css">
</head>
<body>
  <header>
    <div class="container-hero">
        <div class="container hero">
            <div class="container-logo">
                <h1 class="logo"><a href="/">DeliChef Admin</a></h1>
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
                <li><a href="RecetasP.php">Recetas Recibidas </a></li>
                <li><a href="RecetasR.php">Recetas En Linea</a></li>
                <li><a href="/SitioWeb/RegistrarReA.php">Registrar Recetas</a></li>
            </u1>
        </nav>
    </div>
</header>
    <header class="header">
 
        <section class="flex">
           <div class="profile">
            <div class="flex">
               <a href="logout.php" class="delete-btn">Cerrar Sesión</a>
            </div>
           </div>
     
        </section>
     
     </header>

    <br>
    <h1 class="title">Bienvenido administrador</h1>
    <br>
    <h2 class="encabezado">Recetas en Línea</h2>
     <table border="1">
        <thead>
             <tr>
            <td><b>Clave</b></td>
            <td><b>Usuario</b></td>
            <td><b>Categoria</b></td>
            <td><b>Titulo</b></td>
            <td><b>Descripcion</b></td>
            <td><b>Imagen</b></td>
            <td><b>Estatus</b></td>
            <td><b>Acciones</b></td>
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
                    
                    echo '<td>';
                
                    echo '<form method="post" action="RecetasR.php" onsubmit="return confirm(\'¿Estás seguro de que deseas borrar esta receta?\')">';
                    echo '<input type="hidden" name="id_receta" value="'.$datos[$rr]["ID"].'">';
                    echo '<button type="submit" name="borrar">Borrar</button>';
                    echo '</form>';
                    echo '</td>';
                
                    echo '</tr>';
    }

        ?>

        </tbody>
      </table>
    <script src="script.js"></script>
</body>
</html>