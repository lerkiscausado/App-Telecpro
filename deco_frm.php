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
    $query="SELECT ID FROM decodificadores";
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
        <div class="">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card box-grilla">
                        
                        <form action="deco_guardar.php" method="POST" id="deco_frm">
                            <div class="form-row">                                
                                <div class="form-group col-md-6 ">
                                    <label for="NumeroTarjeta" class="col-form-label col-form-label-sm ">Numero Tarjeta</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="NumeroTarjeta" name="txtnumerotarjeta" required>    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">STB ID</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="inputZip" name="txtstbid" required>    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Modelo STB</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="inputZip" name="txtmodelostb">    
                                </div>                                    
                                <div class="form-group col-md-3">
                                    <label for="inputZip" class="col-form-label col-form-label-sm">Serial</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="inputZip" name="txtSerial">    
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cboPrimario" class="col-form-label col-form-label-sm">Tipo Decodificador</label>
                                    <select id="cboPrimario" class="form-control form-control-sm" name="cboTipoDeco" onchange="ActivarCombo(this.value);">
                                        <option value="1">PRINCIPAL</option>
                                        <option value="2">SECUNDARIO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cboSecundario" class="col-form-label col-form-label-sm">Decodificador Principal</label>
                                    <select id="cboSecundario" class="form-control form-control-sm" aria-label="Disabled select example" name="cboDecoPrincipal" disabled required>
                                        <option value="" selected>Seleccionar</option>
                                        <?php
                                        /* INICIO DE Numero de Servicios */
                                        $query="SELECT `TARJETA_PRINCIPAL` AS TARJETA, CONCAT(`TARJETA_PRINCIPAL`,' - ',`STB_ID`) AS DECO
                                        , COUNT(`TARJETA_PRINCIPAL`) AS conteo FROM `decodificadores` GROUP BY `TARJETA_PRINCIPAL` HAVING conteo < 3;";
                                        $resultado = mysqli_query($conn, $query);
                                        $num_row = mysqli_num_rows($resultado);
                                        /* */
                                        if ($num_row > 0){
                                            while($row = mysqli_fetch_array($resultado)){
                                                ?>                                                
                                                <option value="<?php echo $row['TARJETA']?>"><?php echo $row['DECO']?></option>                                                
                                                <?php  
                                            }
                                        }
                                        ?>                                        
                                    </select>
                                    <script>                                        
                                        function ActivarCombo(valor){
                                            if(valor==2){
                                                document.getElementById("cboSecundario").disabled = false;
                                            }else{
                                                document.getElementById("cboSecundario").disabled = true;
                                                document.getElementById("cboSecundario").value = '';
                                            }
                                        };
                                        
                                    </script>                                   
                                </div>
                            </div>                                                        
                            <br>
                            <div class="form-group">                            
                                <button  class="validar-tarjeta btn btn-primary">Enviar</button>
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