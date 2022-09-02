<?php
session_start();
require "controlador/Conexion.php";
$numero_tarjeta = $_POST['txtnumerotarjeta'];
$stb_id =$_POST['txtstbid'];
$modelo_stb =$_POST['txtmodelostb'];
$serial =$_POST['txtSerial'];
$tipo_deco =$_POST['cboTipoDeco'];
if($tipo_deco==1){
    $deco_Principal=$numero_tarjeta;
}else{
    $deco_Principal =$_POST['cboDecoPrincipal'];
}
$estado='LIBRE';


//$estado =$_POST['chkEstado'];

if(!empty($numero_tarjeta)){
    
    $query ="INSERT INTO decodificadores VALUES ('','$numero_tarjeta','$stb_id','$modelo_stb','$serial','$estado','$tipo_deco','$deco_Principal')";
    $resultado = mysqli_query($conn, $query);
    header("location: deco_listar.php");
    
    //$row = mysqli_fetch_array($resultado);
    //$num_row = mysqli_num_rows($resultado);
    //if ($num_row > 0){
        /* $json=array();
        while($row = mysqli_fetch_array($resultado)){
            $json[]=array('usuario'=>$row['USUARIO'],);
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;*/
    /*    $_SESSION['username']= $user;
        
    /*}else{*/
       /* echo $num_row + "no encontro nada";
        echo NULL;
    }*/    
}


?>