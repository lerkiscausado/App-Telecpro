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
    $query="SELECT ID,CONCAT(TIPO_IDENTIFICACION,identificacion) AS IDENTIFICACION,NOMBRE,DIRECCION,TELEFONO,EMAIL, ESTADO FROM clientes";
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
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card box-grilla">
                    <div class="">
                        <table id="example" class="display table table-striped table-sm table-bordered " >
                            <thead>
                                <tr class="">
                                    <th>ID</th>
                                    <th>IDENTIFICACION</th>
                                    <th>NOMBRE</th>
                                    <th>DIRECCION</th>
                                    <th>TELEFONO</th>
                                    <th>EMAIL</th>
                                    <th>ESTADO</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($num_row > 0){
                                        while($row = mysqli_fetch_array($resultado)){
                                ?>
                                <tr class="text_titulo">
                                    <td><?php echo $row['ID']?></td>
                                    <td><?php echo $row['IDENTIFICACION']?></td>
                                    <td><?php echo $row['NOMBRE']?></td>
                                    <td><?php echo $row['DIRECCION']?></td>
                                    <td><?php echo $row['TELEFONO']?></td>
                                    <td><?php echo $row['EMAIL']?></td>
                                    <td><?php echo $row['ESTADO']?></td>
                                    <td class="text-center"><button class="editar-clientes btn btn-primary btn-sm" title="Editar"><i class="bi bi-pencil-square"></i></button></td>
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
    </div>
    <?php
    require 'vistas/foot.php';
    /* FIN DE APLICACION*/
}
?>