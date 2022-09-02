<?php
require "controlador/Conexion.php";
$NumeroTarjeta =$_POST['NumeroTarjeta'];
$Evento =$_POST['Evento'];
$Mensaje =$_POST['Mensaje'];
$Estado=$_POST['Estado'];
$cadena2="CONFIRMADO";
$query ="INSERT INTO eventos (fecha,hora,id_servicio, id_deco, evento, respuesta)
SELECT CURDATE(),NOW(),`servicios`.`ID`, `detalle_servicios`.`ID_DECO`,'$Evento','$Mensaje' FROM `servicios`
INNER JOIN `detalle_servicios` ON (`servicios`.`ID` = `detalle_servicios`.`ID_SERVICIO`)
INNER JOIN `decodificadores`   ON (`detalle_servicios`.`ID_DECO` = `decodificadores`.`ID`)
WHERE (`decodificadores`.`NUMERO_TARJETA` ='$NumeroTarjeta')";
$resultado = mysqli_query($conn, $query);
if(strcmp($Mensaje, $cadena2)==0){
    //ejecutamo la actualizacion
    $query ="UPDATE decodificadores SET estado='$Estado' WHERE numero_tarjeta='$NumeroTarjeta'";
    $res = mysqli_query($conn, $query);
}
echo "Evento Ejecutado";
?>