<?php
session_start();
//echo 'Hola Mundo';
//require "login.php";
$usuario= $_SESSION['username'];
if(!isset($usuario)){
    header("location: login.php");
}else{
    header("location: home.php");
}
?>