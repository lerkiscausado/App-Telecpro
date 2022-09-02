<?php
session_start(); 
$usuario= $_SESSION['username'];
if(!isset($usuario)){
    header("location: ../../index.php");
}else{
    /* CONTENIDO APLICACION*/
    //echo "<h1>Bienvenido $usuario</h1>";
    //echo "<a href='salir.php'>Salir</a>";
    /* INICIO DE HTML */
    require '../../vistas/head.php';
    ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Agregar</button>
    <!-- Modal -->
    <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!--Formulario Persona-->
                    <form action="guardar.php" method="POST">
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
                            <div class="form-group col-md-6">
                                <label for="inputZip" class="col-form-label col-form-label-sm">Identificacion</label>
                                <input type="text" class="form-control form-control-sm" id="inputZip" name="txtIdentificacion" required>    
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
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" name="chkEstado">
                                <label class="form-check-label " for="gridCheck">Activo</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>                            
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                        
                    </form>
                <!--Fin formulario-->
                </div>
                
            </div>
        </div>
    </div>    
    <?    
    require '../../vistas/foot.php';
    /* FIN DE APLICACION*/
}
?>