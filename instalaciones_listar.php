<?php
session_start(); 
require "controlador/Conexion.php";
$usuario= $_SESSION['username'];
if(!isset($usuario)){
    header("location: index.php");
}else{
    /* CONTENIDO APLICACION*/
    //echo "<h1>Bienvenido $usuario</h1>";
    //echo "<a href='salir.php'>Salir</a>";
    /* INICIO DE HTML */
    require 'vistas/head.php';
    /* INICIO DE CONSULTA */
    $query="SELECT `decodificadores`.`ID`,CONCAT(`clientes`.`TIPO_IDENTIFICACION`,clientes.`IDENTIFICACION`) AS IDENTIFICACION
    , `clientes`.`NOMBRE` AS CLIENTE, `servicios`.`FECHA_FACTURA`, `servicios`.`FECHA_CORTE`, IF(servicios.`ESTADO`='A','ACTIVO','INACTIVO') AS SERVICIO
    , `decodificadores`.`NUMERO_TARJETA` AS TARJETA, `decodificadores`.`STB_ID`, `decodificadores`.`TIPO_DECO`, `decodificadores`.`ESTADO` 
    FROM `clientes` INNER JOIN `servicios` ON (`clientes`.`ID` = `servicios`.`ID_CLIENTE`) INNER JOIN `detalle_servicios` ON (`servicios`.`ID` = `detalle_servicios`.`ID_SERVICIO`)
    INNER JOIN `decodificadores` ON (`detalle_servicios`.`ID_DECO` = `decodificadores`.`ID`) WHERE (`decodificadores`.`ESTADO` <>'LIBRE')";
    $resultado = mysqli_query($conn, $query);
    $num_row = mysqli_num_rows($resultado);
    ?>
    <div class="content-wrapper pb-0">        
        <div class="row">
            <div class="col-md-6">
                <div><h3>Instalaciones y Operaciones</h3></div>
            </div>
            <div class="col-md-6">
                <div id="procesando">                    
                </div>                
            </div>
        </div>
        <!-- Grilla -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card box-grilla">
                    <div class="">
                        <table id="example" class="display table table-striped table-sm table-bordered" >
                            <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>IDENTIFICACION</th>
                                    <th>CLIENTE</th>
                                    <th>FECHA FACTURA</th>
                                    <th>FECHA CORTE</th>
                                    <th>SERVICIO</th>
                                    <th>TARJETA</th>                                    
                                    <th>STB</th>
                                    <th>TIPO DECO</th>
                                    <th>DECO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($num_row > 0){
                                        while($row = mysqli_fetch_array($resultado)){
                                ?>
                                <tr class="text_titulo" iddeco="<?php echo $row['TARJETA']?>">
                                    <td><?php echo $row['ID']?></td>
                                    <td><?php echo $row['IDENTIFICACION']?></td>
                                    <td><?php echo $row['CLIENTE']?></td>
                                    <td><?php echo $row['FECHA_FACTURA']?></td>
                                    <td><?php echo $row['FECHA_CORTE']?></td>                                    
                                    <td><?php echo $row['SERVICIO']?></td>
                                    <td><?php echo $row['TARJETA']?></td>
                                    <td><?php echo $row['STB_ID']?></td>
                                    <td><?php echo $row['TIPO_DECO']?></td>
                                    <td><?php echo $row['ESTADO']?></td>
                                    <td class="text-center">
                                        <?php                                        
                                        $cadena1=$row['ESTADO'];
                                        $activo="ACTIVO";
                                        $asignado="ASIGNADO";
                                        $suspendido="SUSPENDIDO";
                                        if(strcmp($cadena1,$activo)==0){
                                            $EstadoInstalar="disabled";                                 
                                            $EstadoConectar="disabled";
                                            $EstadoDesconectar="enabled";
                                            $EstadoDesinstalar="enabled";
                                        }elseif(strcmp($cadena1,$asignado)==0){
                                            $EstadoInstalar="enabled";                                 
                                            $EstadoConectar="disabled";
                                            $EstadoDesconectar="disabled";
                                            $EstadoDesinstalar="disabled";
                                        }else{
                                            $EstadoInstalar="disabled";                                 
                                            $EstadoConectar="enabled";
                                            $EstadoDesconectar="disabled";
                                            $EstadoDesinstalar="enabled";
                                        }
                                        ?>
                                        <button class="instalar-deco btn btn-primary btn-sm " title="Instalar" <?php echo $EstadoInstalar?>><i class="bi bi-plus-lg"></i></button>                                        
                                        <button class="conectar-deco btn btn-success btn-sm" title="Conectar" <?php echo $EstadoConectar?>><i class="bi bi-wifi"></i></button>
                                        <button class="desconectar-deco btn btn-warning btn-sm" title="Desconectar" <?php echo $EstadoDesconectar?>><i class="bi bi-wifi-off"></i></i></button>
                                        <button class="desinstalar-deco btn btn-danger btn-sm" title="Desinstalar" <?php echo $EstadoDesinstalar?>><i class="bi bi-x-lg"></i></button>
                                    </td>
                                    
                                </tr> 
                                <?php
                                        }
                                    }
                                ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN GRILLA -->
    </div>
    <?php
    require 'vistas/foot.php';
    /* FIN DE APLICACION*/
}
?>