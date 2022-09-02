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
    $query="SELECT ID, NUMERO_TARJETA, STB_ID, MODELO_STB, SERIAL, TIPO_DECO, ESTADO FROM decodificadores ORDER BY ID ASC";
    $resultado = mysqli_query($conn, $query);
    $num_row = mysqli_num_rows($resultado);
    ?>
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <div class="header-left">
                <a href="deco_listar.php" class="btn btn-primary mb-2 mb-md-0 mr-2">Consultar Decodificadores</a>                
                <a href="deco_cargar.php" class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Cargar Archivo</a>
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                    <a href="#"><p class="m-0 pr-3">Decodificadores</p></a>
                    <a class="pl-3 mr-4" href="#"><p class="m-0">Numero de Decodificadores: <?php echo $num_row;?></p></a>
                </div>
                <a href="deco_frm.php" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"><i class="mdi mdi-plus-circle"></i> Nuevo Decodificador</a>                
            </div>
        </div>
        <div>
            <h3>Registro y Consulta de Decodificadores</h3>
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
                                    <th>NUMERO TARJETA</th>
                                    <th>STB ID</th>
                                    <th>MODELO STB</th>
                                    <th>SERIAL</th>
                                    <th>TIPO DECO</th>
                                    <th>ESTADO</th>                                    
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($num_row > 0){
                                        while($row = mysqli_fetch_array($resultado)){
                                ?>
                                <tr class="text_titulo" iddeco="<?php echo $row['ID']?>">
                                    <td><?php echo $row['ID']?></td>
                                    <td><?php echo $row['NUMERO_TARJETA']?></td>
                                    <td><?php echo $row['STB_ID']?></td>
                                    <td><?php echo $row['MODELO_STB']?></td>
                                    <td><?php echo $row['SERIAL']?></td>                                    
                                    <td><?php echo $row['TIPO_DECO']?></td>
                                    <td><?php echo $row['ESTADO']?></td>
                                    <td class="text-center">
                                    <button class="editar-deco btn btn-primary btn-sm" title="Editar Decodificadores"><i class="bi bi-pencil-square"></i></button>
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