<?php

    include 'clsservicios.php'; 
    //SE HACE USO DEL PROTOCOLO SOAP SERVER PARA ESTABLECER LA CONEXION CON EL HOSTING 
    $soap= new SoapServer(null,array('uri'=>'http://localhost/'));
    
    //SE EJECUTA LA CLASE QUE CONTIENE LOS METODOS 
    $soap->setClass('clsservicios');
    
    //HACE QUE SE EJECUTE LA CLASE 
    $soap-> handle();




?>