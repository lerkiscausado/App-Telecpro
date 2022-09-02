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
    $query="SELECT CONCAT(`clientes`.`TIPO_IDENTIFICACION`,clientes.`IDENTIFICACION`) AS IDENTIFICACION  , `clientes`.`NOMBRE`, 
    `eventos`.`ID` AS SECUENCIA, `eventos`.`FECHA`, `eventos`.`HORA`, `decodificadores`.`NUMERO_TARJETA` AS SMARTCARD, `decodificadores`.`STB_ID` AS STB, 
    `decodificadores`.`TIPO_DECO` TIPO, `eventos`.`EVENTO`, `eventos`.`RESPUESTA` FROM `clientes` 
    INNER JOIN `servicios` ON (`clientes`.`ID` = `servicios`.`ID_CLIENTE`) INNER JOIN `detalle_servicios` ON (`detalle_servicios`.`ID_SERVICIO` = `servicios`.`ID`)
    INNER JOIN `decodificadores` ON (`detalle_servicios`.`ID_DECO` = `decodificadores`.`ID`) INNER JOIN `eventos` 
    ON (`eventos`.`ID_SERVICIO` = `servicios`.`ID`) GROUP BY `eventos`.`ID`";
    $resultado = mysqli_query($conn, $query);
    $num_row = mysqli_num_rows($resultado);
    ?>
    <div class="content-wrapper pb-0">
        <div>
            <h3>Historial de Eventos</h3>
        </div>            
        <!-- Grilla -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card box-grilla">
                    <div class="">
                        <table id="example" class="display table table-striped table-sm table-bordered" >
                            <thead >
                                <tr>     
                                    <th>SECUENCIA</th>                               
                                    <th>IDENTIFICACION</th>
                                    <th>CLIENTE</th>                                    
                                    <th>FECHA</th>
                                    <th>HORA</th>
                                    <th>TARJETA</th>
                                    <th>STB</th>
                                    <th>TIPO DECO</th>
                                    <th>EVENTO</th>
                                    <th>RESPUESTA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($num_row > 0){
                                        while($row = mysqli_fetch_array($resultado)){
                                ?>
                                <tr class="text_titulo" iddeco="<?php echo $row['TARJETA']?>">                                    
                                    <td><?php echo $row['SECUENCIA']?></td>
                                    <td><?php echo $row['IDENTIFICACION']?></td>
                                    <td><?php echo $row['NOMBRE']?></td>                                    
                                    <td><?php echo $row['FECHA']?></td>
                                    <td><?php echo $row['HORA']?></td>                                                                        
                                    <td><?php echo $row['SMARTCARD']?></td>
                                    <td><?php echo $row['STB']?></td>
                                    <td><?php echo $row['TIPO']?></td>
                                    <td><?php echo $row['EVENTO']?></td>
                                    <td><?php echo $row['RESPUESTA']?></td>                                
                                    
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