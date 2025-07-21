<?php

    define("hostname", "localhost");
    define("user","id21950597_admin_deli");
    define("password","LOSPELONEs2024#");
    define('database', 'id21950597_bd_delichef');
    
    function query($query){

        $cnn= mysqli_connect(hostname,user,password,database);
        if(mysqli_connect_errno()){
            printf("la conexion ha fallado: %s\s", mysqli_connect_errno());
            exit();
        }
        $res= mysqli_query($cnn,$query);
        $cnn->close();
        return $res;
    }
    

?>