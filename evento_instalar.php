<?php
require "controlador/Conexion.php";
require "evento_funciones.php";

$NumTar =$_POST['id'];
//echo 'INSTALAR: '.$id;
// Verificar Tipo Deco
$query ="SELECT servicios.`ID` ,`decodificadores`.`TIPO_DECO` AS TIPO , `decodificadores_1`.`ESTADO`, decodificadores.`NUMERO_TARJETA` AS `TARJETA`
, decodificadores.`STB_ID` AS `STB` , decodificadores.`TARJETA_PRINCIPAL` AS `MASTERCARD` ,'PAK230' AS PAK , (SELECT COUNT(*)+1 FROM eventos) AS REGISTROS FROM `decodificadores` INNER JOIN `decodificadores` AS `decodificadores_1` 
ON (`decodificadores`.`TARJETA_PRINCIPAL` = `decodificadores_1`.`NUMERO_TARJETA`)  INNER JOIN `detalle_servicios` ON (`decodificadores`.`ID` = `detalle_servicios`.`ID_DECO`) 
INNER JOIN `servicios` ON (`servicios`.`ID` = `detalle_servicios`.`ID_SERVICIO`) WHERE decodificadores.`NUMERO_TARJETA`='$NumTar'";
$resultado = mysqli_query($conn, $query);
//$num_row = mysqli_num_rows($resultado);

while($row = mysqli_fetch_array($resultado)){
    if($row['TIPO']=="PRINCIPAL"){
        // Instalar Deco        
        //echo json_encode(objectToArray(Instalar($_user,$_pass,date('dmYHis'),$row['TARJETA'],$row['STB'],$row['PAK'],'')));
        $valor_dos=array();
        $valor_uno=array(
            'resultado' =>"1",
            'answer'=>$row['REGISTROS'],
        );
        $valor_dos=objectToArray(instalar($_user,$_pass,$row['REGISTROS'],$row['TARJETA'],$row['STB'],$row['PAK'],''));
        $valor_uno["resultado"]=(string)$valor_dos["return"];
        
        
        echo json_encode($valor_uno);
    }elseif($row['TIPO']=="SECUNDARIO" and $row['ESTADO']=="ACTIVO"){
        //Instalo Secundario
        $valor_dos=array();
        $valor_uno=array(
            'resultado' =>"1",
            'answer'=>$row['REGISTROS'],
        );
        $valor_dos=objectToArray(instalar($_user,$_pass,$row['REGISTROS'],$row['TARJETA'],$row['STB'],$row['PAK'],$row['MASTERCARD']));
        $valor_uno["resultado"]=(string)$valor_dos["return"];
        
        echo json_encode($valor_uno);
    }else{
        echo  json_encode("Deco Principal no Instalado");
    };
}
//if($row['TIPO']="SECUNDARIO"){
//    echo $row['TIPO'];
//}else{
//    echo $row['TIPO'];
//}
?>