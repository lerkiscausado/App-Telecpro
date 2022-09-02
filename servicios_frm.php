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
    /* INICIO DE Numero de Servicios */
    $query="SELECT ID FROM decodificadores";
    $resultado = mysqli_query($conn, $query);
    $num_row = mysqli_num_rows($resultado);
    /* */

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
                <a href="servicios_frm.php" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"><i class="mdi mdi-plus-circle"></i> Nuevo servicio</a>                
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
        <div class="">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card box-grilla">
                        
                        <form action="servicios_guardar.php" method="POST" id="servicios_frm">                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Fecha Factura</label>
                                    <input type="date" class="form-control form-control-sm text-uppercase" id="inputZip" name="dtFechaFactura" require>    
                                </div>                                    
                                <div class="form-group col-md-6">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Fecha Corte</label>
                                    <input type="date" class="form-control form-control-sm text-uppercase" id="inputZip" name="dtFechaCorte" require>    
                                </div>
                            </div>
                            <div class="form-row">                                
                                <div class="form-group col-md-10">
                                    <label>Seleccione Cliente</label>                                    
                                    <select class="js-example-basic-single form-control form-control-sm" style="width: 100%;" name="cboCliente" id="ServicioCliente">
                                        <option selected>Seleccione Cliente</option>
                                    <?php
                                        /* INICIO DE Numero de Servicios */
                                        $query="SELECT ID,CONCAT(nombre, ' - ',tipo_identificacion,identificacion) AS CLIENTE FROM clientes";
                                        $resultado = mysqli_query($conn, $query);
                                        $num_row = mysqli_num_rows($resultado);
                                        /* */
                                        if ($num_row > 0){
                                            while($row = mysqli_fetch_array($resultado)){
                                                ?>                                                
                                                <option value="<?php echo $row['ID']?>"><?php echo $row['CLIENTE']?></option>                                                
                                                <?php  
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                                         
                            </div>                            
                            <br>                            
                            <div class="form-group">                            
                                <button type="submit" class="validar-servicio btn btn-primary">Enviar</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <?php
    require 'vistas/foot.php';
    /* FIN DE APLICACION*/
}
?>