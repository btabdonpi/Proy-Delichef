<?php
session_start();
$usuario="";
$contra="";

    $datos;
    //VERIFICA QUE SE HAYA PRESIONADO EL BOTÓN btnentrar
    if(isset($_POST["btnIniciar"]))
    {

        if(!empty($_REQUEST['txtEmail']) && !empty($_REQUEST['txtContraseña']))
        {

            $usuario=htmlspecialchars($_REQUEST['txtEmail']);
            $contra=htmlspecialchars($_REQUEST['txtContraseña']);
            
            $cliente=new SoapClient(null, array('uri'=>'http://localhost/','location'=>'https://upmhproyect2024.000webhostapp.com/ServiciosWeb/servicioweb.php'));
            $datos=$cliente->acceso($usuario,$contra);

            if((int)$datos[0]!=0){
  
                    $_SESSION['usuId']=$datos[0]["ID"];
                    $_SESSION['usuEmail']=$datos[1]["EMAIL"];
                    $_SESSION['usuario']=$datos[2]["USUARIO"];
                    $_SESSION['tipUsu']=$datos[3]["ROL"];
                    if($datos[3]["ROL"]=='Administrador'){
                        echo '<script language="javascript"> alert("Bienvenido al sistema ' . $datos[2]["USUARIO"] . ',estás accediendo como ' . $datos[3]["ROL"] . '"); document.location.href="/SitioWeb/admin/RecetasP.php";</script>';
                        exit;
                        
                    }
                    elseif($datos[3]["ROL"]=='Usuario Registrado'){
                        echo '<script language="javascript"> alert("Bienvenido al sistema ' . $datos[2]["USUARIO"] . ',estás accediendo como ' . $datos[3]["ROL"] . '"); document.location.href="InicioRegistrado.php";</script>';
                        exit;
                    }
                    
                
            }
            else{
                $datos[0]=0;
                echo '<script language="javascript">alert("acceso denegado, los datos son incorrectos."); </script>';  
            }

        }
        else{
        echo '<script language="javascript">alert("Se deben ingresar los datos de acceso");</script>';

        }

}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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

   <section class="form-container">
    <form action="" method="post">
    <h3>Inicio Sesión</h3>
  
    <label for="">Correo</label>
    <input type="email" required maxlength="50" name="txtEmail" placeholder="Escribe tú correo electronico" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
    

    <label for="">Contraseña</label>
    <input type="password" required maxlength="20" name="txtContraseña" placeholder="Escribe tú contraseña" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
    
    <input type="submit" value="Iniciar sesión" class="btn" name="btnIniciar">
    <p>¿No tienes cuenta aún? <a href="Registrar.php">Registrarme ahora</a></p>
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