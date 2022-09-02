<?php
session_start();
require "../../controlador/Conexion.php";
$tipoidentificacion = $_POST['cboTipoIdentificacion'];
$identificacion =$_POST['txtIdentificacion'];
$nombre =$_POST['txtNombre'];
$direccion =$_POST['txtDireccion'];
$telefono =$_POST['txtTelefono'];
$email =$_POST['txtEmail'];
if($_POST['chkEstado']){
    $estado='A';
}else{
    $estado='I';
}
$estado =$_POST['chkEstado'];

if(!empty($identificacion)){
    $query ="INSERT INTO clientes VALUES ('','$tipoidentificacion','$identificacion','$nombre','$direccion','$telefono','$email','$estado')";
    $resultado = mysqli_query($conn, $query);
    header("location: cliente.php");
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