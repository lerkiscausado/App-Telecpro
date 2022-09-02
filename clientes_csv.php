<?php
require "controlador/Conexion.php";

$TipoIdentificacion=$_POST['TipoIdentificacion'];
$Identificacion=$_POST['Identificacion'];
$nombre =$_POST['Nombre'];
$Direccion =$_POST['Direccion'];
$Telefono=$_POST['Telefono'];
$Email=$_POST['Email'];
$Estado=$_POST['Estado'];
$query="SELECT `IDENTIFICACION` FROM `clientes` WHERE `IDENTIFICACION` ='$Identificacion'";
$resultado = mysqli_query($conn, $query);
$num_row = mysqli_num_rows($resultado);
if($num_row>0){
    echo 'Usuario Registrado: ' . $TipoIdentificacion . $Identificacion .' '. $nombre;
}else{
    $query="INSERT INTO clientes VALUES('','$TipoIdentificacion','$Identificacion','$Nombre','$Direccion','$Telefono','$Email','$Estado')";
    $resultado = mysqli_query($conn, $query);
    echo 'Registro Exitoso: ' . $TipoIdentificacion . $Identificacion .' '. $nombre;
}

//echo $nombre;
?>