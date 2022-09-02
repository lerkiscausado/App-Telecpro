<?php
session_start(); 
require "../../controlador/Conexion.php";
$usuario= $_SESSION['username'];
if(!isset($usuario)){
    header("location: index.php");
}else{
    /* CONTENIDO APLICACION*/
    //echo "<h1>Bienvenido $usuario</h1>";
    //echo "<a href='salir.php'>Salir</a>";
    /* INICIO DE HTML */
    require '../../vistas/head.php';
    /* INICIO DE CONSULTA */
    $query="SELECT ID,CONCAT(TIPO_IDENTIFICACION,identificacion) AS IDENTIFICACION,NOMBRE,DIRECCION,TELEFONO,EMAIL,IF(estado='A', 'ACTIVO', 'INACTIVO')AS ESTADO FROM clientes";
    $resultado = mysqli_query($conn, $query);
    $num_row = mysqli_num_rows($resultado);
    ?>
    <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>IDENTIFICACION</th>
                <th>NOMBRE</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
    <?php
    if ($num_row > 0){
        while($row = mysqli_fetch_array($resultado)){
            ?>
               <tr idCliente="">
                    <td><?echo $row['ID']?></td>
                    <td><?echo $row['IDENTIFICACION']?></td>
                    <td><?echo $row['NOMBRE']?></td>
                    <td><?echo $row['DIRECCION']?></td>
                    <td><?echo $row['TELEFONO']?></td>
                    <td><?echo $row['EMAIL']?></td>
                    <td><?echo $row['ESTADO']?></td>
                    <td class="text-center"><button class="descargar-pdf btn btn-success btn-sm" >Descargar</button></td>
                </tr> 
            <?
        }
    }
    ?>   
        </tbody>
    </table>

        <h1>Consultar</h1>        
    
    <?
    require '../../vistas/foot.php';
    /* FIN DE APLICACION*/
}
?>