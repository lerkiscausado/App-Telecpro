<?php
session_start();
require "controlador/Conexion.php";
$idCliente = $_POST['cboCliente'];
$fechaActual = date('Y-m-d');
$fechaFactura =$_POST['dtFechaFactura'];
$fechaCorte =$_POST['dtFechaCorte'];
if($_POST['chkEstado']){
    $estado='A';
}else{
    $estado='I';
}


if(!empty($idCliente)){    
    
    
    $query ="INSERT INTO servicios VALUES ('','$idCliente','$fechaActual','$fechaFactura','$fechaCorte','$estado')";
    $resultado = mysqli_query($conn, $query);
    header("location: servicios_listar.php");
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