<?php
session_start();
require "controlador/Conexion.php";
$idDeco =$_POST['idDeco'];
$idServicio=$_POST['idServicio'];

$query ="SELECT id from detalle_servicios WHERE id_deco=$idDeco";
$resultado = mysqli_query($conn, $query);
$row = mysqli_fetch_array($resultado);
$num_row = mysqli_num_rows($resultado);
//if(!empty($id)){

if ($num_row > 0){
    $prueba=array(
       'name' =>'true',
    );
    echo json_encode($prueba);
}else{
    
    //Detalle de Servicios insert
    $query ="INSERT INTO detalle_servicios VALUES ('','$idServicio','$idDeco','INACTIVO')";
    $resultado = mysqli_query($conn, $query);

    //Detalle de Servicios insert
    $query ="UPDATE decodificadores SET estado='ASIGNADO' WHERE id='$idDeco'";
    $resultado = mysqli_query($conn, $query);


    $query="SELECT detalle_servicios.ID, decodificadores.NUMERO_TARJETA, decodificadores.STB_ID, decodificadores.MODELO_STB, 
    decodificadores.TIPO_DECO, decodificadores.`ESTADO` FROM detalle_servicios INNER JOIN decodificadores 
    ON (detalle_servicios.ID_DECO = decodificadores.ID) WHERE (detalle_servicios.ID_SERVICIO = $idServicio)";
    
    $resultado = mysqli_query($conn, $query);
    if(!$resultado){
        die('Fallo consulta'. mysqli_error($resultado));
    }
    $json=array();
        while($row=mysqli_fetch_array($resultado)){
            $json[]=array(
                'id' => $row['ID'],
                'numerotarjeta' => $row['NUMERO_TARJETA'],
                'stbid' => $row['STB_ID'],
                'modelostb' => $row['MODELO_STB'],
                'tipodeco' => $row['TIPO_DECO'],
                'estado' => $row['ESTADO'],
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
    //header("location: clientes_listar.php");
}//}

?>