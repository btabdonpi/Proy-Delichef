<?php


class clsservicios{
    
    public function acceso($usuario,$contra){
        $datos=array();
        require('conexion.php');
        $renglon = query("CALL spValidarAcceso('$usuario','$contra')");

        while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[0]["ID"]=$resultado["CLAVE"];
            if((int)$datos[0]["ID"] != 0){
                $datos[1]["EMAIL"]=$resultado["EMAIL"];
                $datos[2]["USUARIO"]=$resultado["USUARIO"];
                $datos[3]["ROL"]=$resultado["ROL"];
                
            }
            
        }
        return $datos;
    }
    
        public function ListarPendientes()
    {
        $datos=array();
        $reg=0;
        require('conexion.php');
        $renglon=query("call spListarRecPendientes()");
        while($resultado=mysqli_fetch_assoc($renglon))
        {
            //$resultado['Clave'];
            $datos[$reg]["ID"]=$resultado["ID"];
            $datos[$reg]["Usuario"]=$resultado["Usuario"];
            $datos[$reg]["Categoria"]=$resultado["Categoria"];
            $datos[$reg]["Titulo"]=$resultado["Titulo"];
            $datos[$reg]["Descripcion"]=$resultado["Descripcion"];
            $datos[$reg]["Imagen"]=$resultado["Imagen"];
            $datos[$reg]["Estatus"]=$resultado["Estatus"];
            $reg++;
        }
        return $datos;
        
    }
    
     public function ListarLinea()
    {
        $datos=array();
        $reg=0;
        require('conexion.php');
        $renglon=query("call spListarRecLinea()");
        while($resultado=mysqli_fetch_assoc($renglon))
        {
            $datos[$reg]["ID"]=$resultado["ID"];
            $datos[$reg]["Usuario"]=$resultado["Usuario"];
            $datos[$reg]["Categoria"]=$resultado["Categoria"];
            $datos[$reg]["Titulo"]=$resultado["Titulo"];
            $datos[$reg]["Descripcion"]=$resultado["Descripcion"];
            $datos[$reg]["Imagen"]=$resultado["Imagen"];
            $datos[$reg]["Estatus"]=$resultado["Estatus"];
            $reg++;
        }
        return $datos;
        
    }
    
    public function listacategorias(){
        $datos=array();
        $reg=0;
        require('conexion.php');
        $renglon = query("CALL spListCatRecetas()");

        while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[$reg]["CLAVE"]=$resultado["CLAVE"];
            $datos[$reg]["Categoria"]=$resultado["Categoria"];
            $reg++;
            
        }
        return $datos;
    }
    
    public function EliminarRecetas($id){
        $datos=array();
        require('conexion.php');
        $renglon = query("CALL spEliminarRec($id)");

        while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[0]["Mensaje"]=$resultado["Mensaje"];
            
        }
        return $datos;
    }
    
    public function AceptarRecetas($id){
        $datos=array();
        require('conexion.php');
        $renglon = query("CALL spAceptarRec($id)");

        while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[0]["Mensaje"]=$resultado["Mensaje"];
            
        }
        return $datos;
    }
    
    
    
    public function registrarUsuarios($nombre,$ap,$am,$email,$usu,$contra){
        $datos=array();
        require('conexion.php');
        $renglon=query("call spRegistroUsuario('$nombre','$ap','$am','$email','$usu','$contra');");
        while($resultado=mysqli_fetch_assoc($renglon)){

            $datos[0]["REGISTRADO"]=$resultado["INSERTADO"];
        }
        return $datos;
    }
    
    
    public function ListarItaliana()
    {
        $datos=array();
        $reg=0;
        require('conexion.php');
        $renglon=query("call spListaItaliana()");
        while($resultado=mysqli_fetch_assoc($renglon))
        {
            $datos[$reg]["ID"]=$resultado["ID"];
            $datos[$reg]["Usuario"]=$resultado["Usuario"];
            $datos[$reg]["Categoria"]=$resultado["Categoria"];
            $datos[$reg]["Titulo"]=$resultado["Titulo"];
            $datos[$reg]["Descripcion"]=$resultado["Descripcion"];
            $datos[$reg]["Imagen"]=$resultado["Imagen"];
            $datos[$reg]["Estatus"]=$resultado["Estatus"];
            $reg++;
        }
        return $datos;
        
    }
    public function ListarLibanesa()
    {
        $datos=array();
        $reg=0;
        require('conexion.php');
        $renglon=query("call spListaLibanesa()");
        while($resultado=mysqli_fetch_assoc($renglon))
        {
            $datos[$reg]["ID"]=$resultado["ID"];
            $datos[$reg]["Usuario"]=$resultado["Usuario"];
            $datos[$reg]["Categoria"]=$resultado["Categoria"];
            $datos[$reg]["Titulo"]=$resultado["Titulo"];
            $datos[$reg]["Descripcion"]=$resultado["Descripcion"];
            $datos[$reg]["Imagen"]=$resultado["Imagen"];
            $datos[$reg]["Estatus"]=$resultado["Estatus"];
            $reg++;
        }
        return $datos;
        
    }
    public function ListarMexicana()
    {
        $datos=array();
        $reg=0;
        require('conexion.php');
        $renglon=query("call spListaMexicana()");
        while($resultado=mysqli_fetch_assoc($renglon))
        {
            $datos[$reg]["ID"]=$resultado["ID"];
            $datos[$reg]["Usuario"]=$resultado["Usuario"];
            $datos[$reg]["Categoria"]=$resultado["Categoria"];
            $datos[$reg]["Titulo"]=$resultado["Titulo"];
            $datos[$reg]["Descripcion"]=$resultado["Descripcion"];
            $datos[$reg]["Imagen"]=$resultado["Imagen"];
            $datos[$reg]["Estatus"]=$resultado["Estatus"];
            $reg++;
        }
        return $datos;
        
    }
    
public function BuscarReceta($termino){
    $datos = array();
    $reg = 0;
    require('conexion.php');
    $renglon = query("call spBuscarRecetas('$termino')");

    while($resultado = mysqli_fetch_assoc($renglon)){
        if((int)$resultado["ID"] !== 0){
            $datos[$reg]["ID"] = $resultado["ID"];
            $datos[$reg]["Usuario"] = $resultado["Usuario"];
            $datos[$reg]["Categoria"] = $resultado["Categoria"];
            $datos[$reg]["Titulo"] = $resultado["Titulo"];
            $datos[$reg]["Descripcion"] = $resultado["Descripcion"];
            $datos[$reg]["Imagen"] = $resultado["Imagen"];
            $datos[$reg]["Estatus"] = $resultado["Estatus"];
            $reg++;
        }
    }

    return $datos;
}

    
 public function SubirReceta($usuId,$cat,$titu,$des,$img){
        require('conexion.php');
        query("call spSubirRec('$usuId','$cat','$titu','$des','$img');");

     
     
 } 


} 

?>