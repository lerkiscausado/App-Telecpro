<?php
session_start();
require "controlador/Conexion.php";
$id =$_POST['id'];
if(!empty($id)){
    $query ="SELECT id from decodificadores WHERE numero_tarjeta=$id";
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($resultado);
    $num_row = mysqli_num_rows($resultado);
    if ($num_row > 0){
        $prueba=array(
            'name' =>'true',
        );
    }else{
        $prueba=array(
            'name' =>'false',
        );
    }
}
echo json_encode($prueba);
?>