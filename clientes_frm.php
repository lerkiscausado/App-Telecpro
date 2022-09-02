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
    $query="SELECT ID,CONCAT(TIPO_IDENTIFICACION,identificacion) AS IDENTIFICACION,NOMBRE,DIRECCION,TELEFONO,EMAIL,IF(estado='A', 'ACTIVO', 'INACTIVO')AS ESTADO FROM clientes";
    $resultado = mysqli_query($conn, $query);
    $num_row = mysqli_num_rows($resultado);
    ?>
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <div class="header-left">
                <a href="clientes_listar.php" class="btn btn-primary mb-2 mb-md-0 mr-2">Consultar Clientes</a>                
                <a href="clientes_cargar.php" class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Cargar Archivo</a>
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                    <a href="#"><p class="m-0 pr-3">Clientes</p></a>
                    <a class="pl-3 mr-4" href="#"><p class="m-0">Numero de Clientes: <?php echo $num_row;?></p></a>
                </div>
                <a href="clientes_frm.php" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"><i class="mdi mdi-plus-circle"></i> Nuevo Cliente</a>                
            </div>
        </div>
        <div>
            <h3>Registro y Consulta de Clientes</h3>
        </div>
        <div class="">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card box-grilla">
                        <form action="clientes_guardar.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState " class="col-form-label col-form-label-sm">Tipo de Identificacion</label>
                                    <select id="inputState" class="form-control form-control-sm" name="cboTipoIdentificacion">
                                        <option value="CC">CC - Cedula de Ciudadania</option>
                                        <option value="TI">TI - Tarjeta de Identidad</option>
                                        <option value="RC">RC - Registro Civil</option>
                                        <option value="CE">CE - Cedula  de Extranjeria</option>
                                        <option value="PE">PE - Permiso Especial</option>
                                        <option value="PA">PA - Pasaporte</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="inputZip" class="col-form-label col-form-label-sm ">Identificacion</label>
                                    <input type="number" class="form-control form-control-sm" id="inputZip" name="txtIdentificacion" required>    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Nombre o Razon Social</label>
                                    <input type="text" class="form-control form-control-sm" id="inputZip" name="txtNombre" required>    
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="inputZip" class="col-form-label col-form-label-sm">Direccion</label>
                                <input type="text" class="form-control form-control-sm" id="inputZip" name="txtDireccion">    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Telefonos</label>
                                    <input type="text" class="form-control form-control-sm" id="inputZip" name="txtTelefono">    
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Email</label>
                                    <input type="text" class="form-control form-control-sm" id="inputZip" name="txtEmail">    
                                </div>                
                            </div>
                            <br>
                            <div class="form-group">                            
                                <button type="submit" class="btn btn-primary">Enviar</button>
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