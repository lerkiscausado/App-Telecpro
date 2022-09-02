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
    
    ?>
    <div class="content-wrapper pb-0">        
        <div class="page-header flex-wrap">
            <div class="header-left">                
                <a href="servicios_listar.php" class="btn btn-primary mb-2 mb-md-0 mr-2">Consultar Servicios</a>                
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Cargar Archivo</button>                
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">                
                    <a href="#"><p class="m-0 pr-3">Servicios</p></a>
                    <a class="pl-3 mr-4" href="#"><p class="m-0">Numero de Servicios: <?php echo $num_row;?></p></a>                    
                </div>
                <a href="servicios_frm.php" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"><i class="mdi mdi-plus-circle"></i> Nuevo Servicio</a>                
            </div>
        </div>
        <!-- Configuracion de Servicios -->
        <div>
            <h3>Registro, Consulta y Configuracion de Servicios</h3>
        </div>
        <div class="row">
            <div class="col-md-12">                
                <form action="servicios_configurar.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail3" class="col-form-label">Configuracion de Servicios: </label>
                            <select name="cboConfigurarServicios" id="" class="js-example-basic-single ">
                                <?php
                                    $query="SELECT servicios.id AS ID, CONCAT(clientes.nombre,' - ',clientes.tipo_identificacion,clientes.identificacion) AS CLIENTE FROM	servicios	
                                    INNER JOIN clientes ON (servicios.`ID_CLIENTE`=clientes.id)";
                                    $resultado = mysqli_query($conn, $query);
                                    $num_row = mysqli_num_rows($resultado);
                                    if ($num_row > 0){
                                        while($row = mysqli_fetch_array($resultado)){
                                ?>
                                <option value="<?php echo $row['ID']?>"><?php echo $row['CLIENTE']?></option>                                
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-warning" title="Configurar Servicios"><i class="bi bi-gear"></i></button>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
        <hr>
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
                                    <th>ESTADO FACTURA</th>
                                    <th>ESTADO SERVICIO</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query="SELECT servicios.id AS ID, CONCAT(clientes.tipo_identificacion,clientes.identificacion) AS IDENTIFICACION,clientes.nombre AS NOMBRE	,servicios.FECHA_FACTURA
                                    ,servicios.FECHA_CORTE, servicios.ESTADO, servicios.ESTADO_FACTURA FROM	servicios	INNER JOIN clientes ON (servicios.`ID_CLIENTE`=clientes.id)";
                                    $resultado = mysqli_query($conn, $query);
                                    $num_row = mysqli_num_rows($resultado);
                                    if ($num_row > 0){
                                        while($row = mysqli_fetch_array($resultado)){
                                ?>
                                <tr class="text_titulo" idServicios="<?php echo $row['ID']?>">
                                    <td><?php echo $row['ID']?></td>
                                    <td><?php echo $row['IDENTIFICACION']?></td>
                                    <td><?php echo $row['NOMBRE']?></td>
                                    <td><?php echo $row['FECHA_FACTURA']?></td>
                                    <td><?php echo $row['FECHA_CORTE']?></td>                                    
                                    <td><?php echo $row['ESTADO_FACTURA']?></td>
                                    <td><?php echo $row['ESTADO']?></td>
                                    <td class="text-center">
                                        <button class="editar-servicios btn btn-primary btn-sm" title="Editar"><i class="bi bi-pencil-square"></i></button>
                                        <button class="conectar-servicio btn btn-success btn-sm" title="Conectar"><i class="bi bi-wifi"></i></button>
                                        <button class="desconectar-servicio btn btn-warning btn-sm" title="Desconectar"><i class="bi bi-wifi-off"></i></i></button>
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