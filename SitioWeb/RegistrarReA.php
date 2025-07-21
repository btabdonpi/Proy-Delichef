<?php
session_start();
$usuario = "";
$contra = "";


$datos = array();
$cliente = new SoapClient(null, array('uri' => 'http://localhost/', 'location' => 'https://upmhproyect2024.000webhostapp.com/ServiciosWeb/servicioweb.php'));
$datos = $cliente->listacategorias();

if (isset($_POST["btnSubir"])) {
    $usuId = $_SESSION['usuId'];
    $cat = htmlspecialchars($_REQUEST['lstTipo']);
    $titu = htmlspecialchars($_REQUEST['txtTitulo']);
    $des = htmlspecialchars($_REQUEST['txtDescripcion']);

    // Se establece el tipo de imagen a guardar
    $tipo = array("image/jpg", "image/jpeg", "image/png");
    // Tamaño máximo
    $tamImg = 1600000000;
    // Se obtiene la ruta temporal de la imagen
    $temp = $_FILES["imagen"]["tmp_name"];
    // Se valida el tipo y tamaño que no exceda
    if (in_array($_FILES['imagen']['type'], $tipo) && $_FILES['imagen']['size'] <= $tamImg * 1024) {
        // Se obtienen los datos básicos de la imagen
        $nom = $_FILES['imagen']['name'];
        $tam = (int) $_FILES['imagen']['size'];
        $tip = $_FILES['imagen']['type'];
        // Ruta donde va a guardar la imagen
        $foto = "imgs/" . $nom;
        // Copia la imagen a la carpeta donde se guardará la imagen
        move_uploaded_file($temp, $foto);
        //echo "Ruta nueva: " . $foto;

        $cliente = new SoapClient(null, array('uri' => 'http://localhost/', 'location' => 'https://upmhproyect2024.000webhostapp.com/ServiciosWeb/servicioweb.php'));
        $datos = $cliente->SubirReceta($usuId, $cat, $titu, $des, $foto);
        echo '<script language="javascript">alert("Favor de revisar las recetas Pendientes"); document.location.href="/SitioWeb/RegistrarReA.php"; </script>';
    } else
        echo "<script>alert('Revisar tipo de imagen y que el tamaño no exceda el límite');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Receta</title>
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
                <li><a href="admin/RecetasP.php">Recetas Recibidas </a></li>
                <li><a href="admin/RecetasR.php">Recetas En Linea</a></li>
                <li><a href="RegistrarReA.php">Registrar Recetas</a></li>
              </u1>
          </nav>
      </div>


  </header>
<header class="header">
 
      <section class="flex">
         <div class="profile">
            <p class="name">Mi perfil</p>
            <div class="flex">
               <a href="admin/PerfilA.php" class="btn">Mi perfil</a>
               <a href="logout.php" class="delete-btn">Cerrar Sesión</a>
            </div>
         </div>

      </section>

   </header>
 <section class="form-container">
    
    <form action="" method="post"  enctype="multipart/form-data">
      <h3>Registrar receta</h3>
      
      <label for="">Clasificación</label>
    <td>
    <select name="lstTipo" id="">
        <?php

            for($rr=0;$rr<count($datos);$rr++){
               echo '<option value="'.$datos[$rr]["CLAVE"].'">'.$datos[$rr]["Categoria"].'</option>';
            
            }
        ?>
    </select>
    </td>
      <label for="">Nombre del platillo</label>
      <input type="text" name="txtTitulo" required placeholder="Escribe el nombre del platillo" maxlength="50" class="box">
      <label for="">Procedimiento</label>
      <textarea name="txtDescripcion" placeholder="Escribe los ingredientes y procedimiento de la receta..." required class="box" cols="30" rows="10" maxlength="500"></textarea>
      <label for="archivo">Imagen del platillo</label>
        <input type="file" id="archivo" name="imagen" >
      <br>
     
      <input type="submit" value="Enviar receta" class="btn" name="btnSubir" href="/SitioWeb/RegistrarRe.php">
    </form>
 
 </section>

 <script src="script.js"></script>
</body>
</html>