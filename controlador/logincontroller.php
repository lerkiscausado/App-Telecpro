<?php
session_start();
require "Conexion.php";
$user = $_POST['user'];
$pass =$_POST['pass'];
if(!empty($user)){
    $query ="SELECT USUARIO FROM users WHERE usuario='$user' AND pass='$pass'";
    $resultado = mysqli_query($conn, $query);
    //$row = mysqli_fetch_array($resultado);
    $num_row = mysqli_num_rows($resultado);
    if ($num_row > 0){
        /* $json=array();
        while($row = mysqli_fetch_array($resultado)){
            $json[]=array('usuario'=>$row['USUARIO'],);
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;*/
        $_SESSION['username']= $user;        
        header("location: ../home.php");
    }else{
        echo $num_row + "no encontro nada";
        echo NULL;
    }
}
?>