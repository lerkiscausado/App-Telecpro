<?php
require "controlador/Conexion.php";

$NumeroTarjeta=$_POST['NumeroTarjeta'];
$StbId=$_POST['StbId'];
$Modelo=$_POST['ModeloStb'];
$Serial=$_POST['Serial'];

$query="SELECT id FROM decodificadores WHERE NUMERO_TARJETA='$NumeroTarjeta'";
$resultado = mysqli_query($conn, $query);
$num_row = mysqli_num_rows($resultado);
if($num_row>0){
    echo '1- Decodificador ya fue Registrado: ' . $NumeroTarjeta .' '. $StbId;
}else{
    $query="SELECT tarjeta_principal as TARJETA FROM decodificadores ORDER BY id DESC LIMIT 1;";    
    $resultado = mysqli_query($conn, $query);
    $num_row = mysqli_num_rows($resultado);
    if($num_row=0){
        // Registramos el primer DECO como principal
        $query ="INSERT INTO decodificadores VALUES ('','$NumeroTarjeta','$StbId','$Modelo','$Serial','LIBRE','PRINCIPAL','$NumeroTarjeta')";
        $ResultadoGuardar = mysqli_query($conn, $query);
        echo '2- Registro Exitoso: '. $NumeroTarjeta.' - '.$StbId.' - '.$Modelo.' - '.$Serial;
    }else{
        // ya tenemos Informacion 
        while($row=mysqli_fetch_array($resultado)){        
            $TarjetaPrincipal= $row['TARJETA'];
        }

        $query="SELECT id FROM decodificadores WHERE tarjeta_principal='$TarjetaPrincipal'";    
        $resultado = mysqli_query($conn, $query);
        $num_row = mysqli_num_rows($resultado);
        if($num_row<3){
            // registramos DECOS como Secundarios
            $query ="INSERT INTO decodificadores VALUES ('','$NumeroTarjeta','$StbId','$Modelo','$Serial','LIBRE','SECUNDARIO','$TarjetaPrincipal')";
            $ResultadoGuardar = mysqli_query($conn, $query);
            echo '3- Registro Exitoso: '. $NumeroTarjeta.' - '.$StbId.' - '.$Modelo.' - '.$Serial;
        }else{
            // registramos DECOS primarios
            $query ="INSERT INTO decodificadores VALUES ('','$NumeroTarjeta','$StbId','$Modelo','$Serial','LIBRE','PRINCIPAL','$NumeroTarjeta')";
            $ResultadoGuardar = mysqli_query($conn, $query);
            echo '4- Registro Exitoso: '. $NumeroTarjeta.' - '.$StbId.' - '.$Modelo.' - '.$Serial;
        }
    }
    
    
        
    //$jsonstring=json_encode($json);
    
}

//echo $nombre;
?>