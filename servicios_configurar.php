<?php
session_start(); 
require "controlador/Conexion.php";
$usuario= $_SESSION['username'];
$id=$_POST['cboConfigurarServicios'];
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
        <div>
            <h3>Registro y Consulta de Servicios</h3>
        </div>
        <!-- Configuracion de Servicios -->
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
        <!-- Formulario Configurar Servicios -->
        <div class="">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card box-grilla">
                        <h4>Configuracion de Servicios</h4>
                        <form action="#" method="POST">
                            <?php
                                $query="SELECT CONCAT(`clientes`.`TIPO_IDENTIFICACION`,`clientes`.`IDENTIFICACION`) AS IDENTIFICACION, `clientes`.`NOMBRE` AS `CLIENTE`, 
                                `servicios`.`FECHA_FACTURA`, `servicios`.`FECHA_CORTE` FROM `servicios` INNER JOIN `clientes` ON (`servicios`.`ID_CLIENTE` = `clientes`.`ID`) 
                                WHERE (`servicios`.`ID` =$id)";
                                $resultado = mysqli_query($conn, $query);
                                $num_row = mysqli_num_rows($resultado);
                                $row = mysqli_fetch_array($resultado)                                
                            ?>                            
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Identificacion</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="inputZip" name="dtFechaFactura" value="<?php echo $row['IDENTIFICACION']?>" readonly>    
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Cliente</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="inputZip" name="dtFechaFactura" value="<?php echo $row['CLIENTE'];?>" readonly>    
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="idServicio" class="col-form-label col-form-label-sm">ID Servicio</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="idServicio" name="dtFechaFactura" value="<?php echo $id?>" readonly>    
                                </div>
                            </div>
                            <div class="form-row">                                
                                <div class="form-group col-md-6">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Fecha Factura</label>
                                    <input type="date" class="form-control form-control-sm text-uppercase" id="inputZip" name="dtFechaFactura" value="<?php echo $row['FECHA_FACTURA'];?>" readonly>    
                                </div>                                    
                                <div class="form-group col-md-6">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Fecha Corte</label>
                                    <input type="date" class="form-control form-control-sm text-uppercase" id="inputZip" name="dtFechaCorte" value="<?php echo $row['FECHA_CORTE'];?>" readonly>    
                                </div>
                            </div>
                            <div class="form-row">                                
                                <div class="form-group col-md-12">
                                    <label>Asignar Decodificadores</label>                                    
                                    <select class="js-example-basic-single form-control form-control-sm" style="width: 100%;" name="cboCliente" id="idDeco">
                                        <option selected>Seleccione DECO</option>
                                    <?php
                                        /* INICIO DE Numero de Servicios */
                                        $query="SELECT decodificadores.id AS ID, CONCAT(decodificadores.`MODELO_STB`,' : ',decodificadores.`NUMERO_TARJETA`,' : ',decodificadores.`STB_ID`) AS DECOS 
                                        FROM decodificadores WHERE decodificadores.`ESTADO`='LIBRE'
                                        ";
                                        $resultado = mysqli_query($conn, $query);
                                        $num_row = mysqli_num_rows($resultado);
                                        /* */
                                        if ($num_row > 0){
                                            while($row = mysqli_fetch_array($resultado)){
                                                ?>                                                
                                                <option value="<?php echo $row['ID']?>"><?php echo $row['DECOS']?></option>                                                
                                                <?php  
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>                                    
                            </div>                                                        
                            <hr>                                 
                            <div class="form-group ">                            
                                <button type="submit" class="asignar-deco btn btn-primary"> Asignar Decodificadores</button>
                            </div>                            
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN Configurar Servicios -->
        <!-- GRILLA DECOS -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card box-grilla">                    
                    <table id="" class="display table table-striped table-sm table-bordered" >
                        <thead >
                            <tr>
                                <th>ID</th>                                
                                <th>SMART CARD</th>
                                <th>STB ID</th>  
                                <th>MODELO</th>
                                <th>TIPO</th>                              
                                <th>ESTADO</th>                                    
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody id="idConsultaServicios">
                            <?php
                                $query="SELECT detalle_servicios.ID, decodificadores.NUMERO_TARJETA, decodificadores.STB_ID, decodificadores.MODELO_STB, 
                                decodificadores.TIPO_DECO, decodificadores.`ESTADO` FROM detalle_servicios INNER JOIN decodificadores 
                                ON (detalle_servicios.ID_DECO = decodificadores.ID) WHERE (detalle_servicios.ID_SERVICIO = $id)";
                                $resultado = mysqli_query($conn, $query);
                                $num_row = mysqli_num_rows($resultado);
                                /* */
                                if ($num_row > 0){
                                    while($row = mysqli_fetch_array($resultado)){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $row['ID']?></td>
                                            <td><?php echo $row['NUMERO_TARJETA']?></td>
                                            <td><?php echo $row['STB_ID']?></td>
                                            <td><?php echo $row['MODELO_STB']?></td>
                                            <td><?php echo $row['TIPO_DECO']?></td>
                                            <td><?php echo $row['ESTADO']?></td>
                                            <td><button class="eliminar-deco btn btn-danger btn-sm" title="Eliminar"><i class="bi bi-x-lg"></i></button></td>
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

        <!-- FIN GRILLA -->
    </div>
    
    <?php
    require 'vistas/foot.php';
    /* FIN DE APLICACION*/
}
?>