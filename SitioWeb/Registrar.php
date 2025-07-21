
<?php

    $usuario="";
    $rol="";
    $tipo="";
    $nombre="";
    $ap="";
    $am="";
    $usu="";
    $contra="";
    $datos=array();
    $registrar;
   
    if(!empty($_SESSION['usuNombre']) && !empty($_SESSION['tipRol']))
    {
        $usuario=$_SESSION['usuNombre'];
        $rol=$_SESSION['tipRol'];
    }
    //EJECUTA EL SERVICIO WEB
    //######### HACE USO DEL SERVICIO WEB QUE ESTA PUBLICADO DE MANERA LOCAL ########
    $cliente=new SoapClient(null, array('uri'=>'http://localhost/','location'=>'https://upmhproyect2024.000webhostapp.com/ServiciosWeb/servicioweb.php'));
    //$datos=$cliente->listarTipoUsuarios();
   
    if(isset($_POST['btnRegistrar']))
    {
        if(!empty($_REQUEST['txtNombre']) && !empty($_REQUEST['txtPaterno']) && !empty($_REQUEST['txtEmail']) && !empty($_REQUEST['txtUsuario']) && !empty($_REQUEST['txtContra']))
        {
            //OBTIENE LOS VALORES
            $nombre=htmlspecialchars($_REQUEST['txtNombre']);
            $ap=htmlspecialchars($_REQUEST['txtPaterno']);
            $am=htmlspecialchars($_REQUEST['txtMaterno']);
            $email=htmlspecialchars($_REQUEST['txtEmail']);
            $usu=htmlspecialchars($_REQUEST['txtUsuario']);
            $contra=htmlspecialchars($_REQUEST['txtContra']);
           
            // VALIDAR QUE TODOS LOS CONTROLES TENGAN DATOS
            $registrar=$cliente->registrarUsuarios($nombre, $ap, $am,$email, $usu, $contra);
            if((int)$registrar[0]["REGISTRADO"]!=0)
            {
                $tipo="";
                $nombre="";
                $ap="";
                $am="";
                $usu="";
                $contra="";
                echo "<script>alert('Usuario registrado correctamente con la clave: ".$registrar[0]["REGISTRADO"]."');</script>";
            }
            else
            echo "<script>alert('El nombre de usuario ya esta en uso');</script>";
        }
        else
        echo "<script>alert('Los datos marcados con * son OBLIGATORIOS, no puedes dejar espacios vacíos');</script>";
    }
   
    /*
    if(isset($_POST['btnLimpiar']))
    {
        $tipo="";
        $nombre="";
        $ap="";
        $am="";
        $usu="";
        $contra="";
    }
   */
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
                    <li><a href="InicioR.html">Inicio</a></li>
                    <li><a href="nosotros.html">Nosotros</a></li>
                    <li><a href="Recetas.html">Recetas</a></li>
                    <li><a href="Contacto.html">Contacto</a></li>
                    <li><a href="buscarR.php">Buscar recetas</a></li>
                </u1>
            </nav>
        </div>

    </header>
      <header class="header">
         <section class="flex">
            <div class="profile">
              <p class="account"><a href="InicioS.php">Iniciar Sesión </a> or <a href="Registrar.php">Registrarme</a></p>
            </div>
         </section>
      </header>
  </header>

    
    <section class="form-container">
    
       <form action="" method="post">
          <h3>Registrarme ahora</h3>
          <div>
          <label for="">Nombre</label>
          <input type="text" required maxlength="50" name="txtNombre" placeholder="Escribe tú nombre" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
          </div>
          <div>
            <label for="">Apellido Paterno</label>
            <input type="text" required maxlength="50" name="txtPaterno" placeholder="Escribe Apellido Paterno" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         </div>
         <div>
            <label for="">Apellido Materno</label>
            <input type="text" required maxlength="50" name="txtMaterno" placeholder="Escribe tú Apellido Materno" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         </div>
          <label for="">Correo</label>
          <input type="email" required maxlength="40" name="txtEmail" placeholder="Ingresa tu correo electronico" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <div>
            <label for="">Nombre de usuario </label>
            <input type="text" required maxlength="20" name="txtUsuario" placeholder="Escribe tú Usuario" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         </div>

          <br>
          <label for="">Contraseña</label>
          <input type="password" required maxlength="20" name="txtContra" placeholder="Escribe tu contraseña" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
          <br>
          <input type="submit" value="Registrarme ahora" class="btn" name="btnRegistrar">
          <p>¿Ya tienes cuenta? <a href="InicioS.php">Iniciar sesión</a></p>
       </form>
    
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