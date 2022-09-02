<?php
session_start(); 
require "controlador/Conexion.php";
$usuario= $_SESSION['username'];
//$usuario='lerkis';
if(!isset($usuario)){
    header("location: index.php");
    echo "Hola mundo 1";
}else{
    /* CONTENIDO APLICACION*/
    //echo "<h1>Bienvenido $usuario</h1>";
    //echo "<a href='salir.php'>Salir</a>";
    /* INICIO DE HTML */
    require 'vistas/head.php';
    ?>
    <div class="content-wrapper pb-0">
        <!-- Bienvenida Telecpro -->
        <div class="row">
			<div class="col-xl-9 stretch-card grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between flex-wrap">
							<div><div class="card-title mb-0">App - TELECPRO</div><h3 class="font-weight-bold mb-0">Diseñada por ADOS Software</h3></div>
							<div>
								<div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
									<div class="d-flex mr-5">
										<button type="button" class="btn btn-social-icon btn-outline-sales"><i class="mdi mdi-cellphone-basic"></i></button>
										<div class="pl-2">
											<h3 class="mb-0 font-weight-semibold head-count"> Teléfono </h3>
											<span class="font-10 font-weight-semibold text-muted">304 3535702</span>
										</div>
									</div>
									<div class="d-flex mr-3 mt-2 mt-sm-0">
										<button type="button" class="btn btn-social-icon btn-outline-sales profit"><i class="mdi mdi-email-outline"></i></button>
										<div class="pl-2">
											<h3 class="mb-0 font-weight-semibold head-count"> Contacto </h3>
											<span class="font-10 font-weight-semibold text-muted">soporte@ados-software.com</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<p class="text-muted font-13 mt-2 mt-sm-0"> Aplicación para el control y administración de Servicios de TELEVISION. <a class="text-muted font-13" href="http://ados-software.com/" target="_blank"><u>Leer Mas...</u></a></p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 stretch-card grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="d-flex border-bottom mb-4 pb-0">
							<div class="hexagon">
								<div class="hex-mid hexagon-success">
									<i class="mdi mdi-desktop-tower"></i>
								</div>
							</div>
							<div class="pl-4">
								<h4 class="font-weight-bold text-success mb-0">Decos</h4>
								<h6 class="text-muted">
									<?php
										$query="SELECT `ID` FROM `decodificadores` where estado='LIBRE'";
										$resultado = mysqli_query($conn, $query);
										$num_row = mysqli_num_rows($resultado);
										echo $num_row;
									?> Libres
								</h6>
							</div>
						</div>
						<div class="d-flex">
							<div class="hexagon">
								<div class="hex-mid hexagon-danger">
									<i class="bi bi-wifi-off"></i>
								</div>
							</div>
							<div class="pl-4">
								<h4 class="font-weight-bold text-danger mb-0">Decos</h4>
								<h6 class="text-muted mb-0"> 
									<?php
										$query="SELECT `ID` FROM `decodificadores` WHERE `ESTADO` ='SUSPENDIDO'";
										$resultado = mysqli_query($conn, $query);
										$num_row = mysqli_num_rows($resultado);
										echo $num_row;
									?> Suspendidos
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>			
        <!-- DECOS y INSTALACIONES PENDIENTES -->
		<div class="row">
			<div class="col-xl-4 stretch-card grid-margin">
				<!--Informacion de los DECOS -->				
				<div class="card">
					<div class="card-body">
						<div class="d-flex border-bottom mb-4 pb-2">
							<div class="hexagon">
								<div class="hex-mid hexagon-warning">
									<i class="mdi mdi-desktop-tower"></i>
								</div>
							</div>
							<div class="pl-4">
								<h4 class="font-weight-bold text-warning mb-0">
									<?php
									$query="SELECT `ID` FROM `decodificadores`";
									$resultado = mysqli_query($conn, $query);
									$num_row = mysqli_num_rows($resultado);
									echo $num_row;
									?>
								</h4>
								<h6 class="text-muted">Decos Totales</h6>
							</div>
						</div>
						<div class="d-flex border-bottom mb-4 pb-2">
							<div class="hexagon">
								<div class="hex-mid hexagon-danger">
									<i class="mdi mdi-desktop-tower"></i>
								</div>
							</div>
							<div class="pl-4">
								<h4 class="font-weight-bold text-danger mb-0">
								<?php
									$query="SELECT `ID` FROM `decodificadores` WHERE `TIPO_DECO` ='PRINCIPAL'";
									$resultado = mysqli_query($conn, $query);
									$num_row = mysqli_num_rows($resultado);
									echo $num_row;
									?>
								</h4>
								<h6 class="text-muted">Decos Principales</h6>
							</div>
						</div>
						<div class="d-flex border-bottom mb-4 pb-2">
							<div class="hexagon">
								<div class="hex-mid hexagon-success">
									<i class="mdi mdi-desktop-tower"></i>
								</div>
							</div>
							<div class="pl-4">
								<h4 class="font-weight-bold text-success mb-0">
								<?php
									$query="SELECT `ID` FROM `decodificadores` WHERE `TIPO_DECO` <>'PRINCIPAL'";
									$resultado = mysqli_query($conn, $query);
									$num_row = mysqli_num_rows($resultado);
									echo $num_row;
									?>
								</h4>
								<h6 class="text-muted">Decos Secundarios</h6>
							</div>
						</div>
						<div class="d-flex border-bottom mb-4 pb-2">
							<div class="hexagon">
								<div class="hex-mid hexagon-info">
									<i class="mdi mdi-desktop-tower"></i>
								</div>
							</div>
							<div class="pl-4">
								<h4 class="font-weight-bold text-info mb-0">
								<?php
									$query="SELECT `ID` FROM `decodificadores` WHERE `ESTADO` ='ACTIVO'";
									$resultado = mysqli_query($conn, $query);
									$num_row = mysqli_num_rows($resultado);
									echo $num_row;
								?>
								</h4>
								<h6 class="text-muted">Decos Instalados</h6>
							</div>
						</div>
						<div class="d-flex">
							<div class="hexagon">
								<div class="hex-mid hexagon-primary">
									<i class="mdi mdi-desktop-tower"></i>
								</div>
							</div>
							<div class="pl-4">
								<h4 class="font-weight-bold text-primary mb-0"> 
								<?php
									$query="SELECT `ID` FROM `decodificadores` WHERE `ESTADO` ='ASIGNADO'";
									$resultado = mysqli_query($conn, $query);
									$num_row = mysqli_num_rows($resultado);
									echo $num_row;
								?>
								</h4>
								<h6 class="text-muted mb-0">Instalaciones Pendientes</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xl-8 stretch-card grid-margin">
				<div class="card">
					<div class="card-body pb-0">
						<h4 class="card-title mb-0">Decos - Instalaciones Recientes</h4>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table custom-table text-dark">
								<thead>
									<tr>
										<th>Fecha</th>
										<th>Identificacion</th>
										<th>Nombre</th>
										<th>Tarjeta</th>
										<th>STB</th>
										<th>Tipo</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query="SELECT eventos.`FECHA`,CONCAT(`clientes`.`TIPO_IDENTIFICACION`,clientes.`IDENTIFICACION`) AS IDENTIFICACION
									, `clientes`.`NOMBRE`, `decodificadores`.`NUMERO_TARJETA` AS TARJETA, `decodificadores`.`STB_ID` AS STB, `decodificadores`.`TIPO_DECO` TIPO
									FROM `clientes` INNER JOIN `servicios` ON (`clientes`.`ID` = `servicios`.`ID_CLIENTE`) 
									INNER JOIN `detalle_servicios` ON (`detalle_servicios`.`ID_SERVICIO` = `servicios`.`ID`)
									INNER JOIN `decodificadores` ON (`detalle_servicios`.`ID_DECO` = `decodificadores`.`ID`)
									INNER JOIN `eventos` ON (`eventos`.`ID_SERVICIO` = `servicios`.`ID`)
									WHERE eventos.`RESPUESTA`='CONFIRMADO' AND eventos.`EVENTO` IN ('INSTALAR','RECONECTAR') GROUP BY `eventos`.`ID` ORDER BY eventos.id DESC LIMIT 5";
									$resultado = mysqli_query($conn, $query);
									$num_row = mysqli_num_rows($resultado);
									if ($num_row > 0){
                                        while($row = mysqli_fetch_array($resultado)){
									?>
									<tr>
										<td><i class="mdi mdi-import"></i> <?php echo $row['FECHA']?></td>
										<td><?php echo $row['IDENTIFICACION']?></td>										
										<td><?php echo $row['NOMBRE']?></td>
										<td><?php echo $row['TARJETA']?></td>
										<td><?php echo $row['STB']?></td>
										<td><?php echo $row['TIPO']?></td>
									</tr>
									<?php
										}
									}
									?>
										
								</tbody>
							</table>
						</div>
						<a class="text-black font-13 d-block pt-2 pb-2 pb-lg-0 font-weight-bold pl-4" href="instalaciones_listar.php">Ver Mas...</a>
						<br>
					</div>
				</div>
			</div>
		</div>
		<!-- last row starts here -->
		<div class="row">
			<div class="col-sm-6 col-xl-4 stretch-card grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="card-title mb-2">Eventos Recientes</div>
						<?php
						$query="SELECT `clientes`.`NOMBRE`, `eventos`.`FECHA`, `eventos`.`HORA`, `decodificadores`.`NUMERO_TARJETA` AS TARJETA
						, `eventos`.`EVENTO`, `eventos`.`RESPUESTA`,IF(eventos.respuesta='CONFIRMADO','mdi-check','mdi-close') AS ICONO FROM `clientes`
						INNER JOIN `servicios` ON (`clientes`.`ID` = `servicios`.`ID_CLIENTE`)
						INNER JOIN `detalle_servicios` ON (`detalle_servicios`.`ID_SERVICIO` = `servicios`.`ID`)
						INNER JOIN `decodificadores` ON (`detalle_servicios`.`ID_DECO` = `decodificadores`.`ID`)
						INNER JOIN `eventos` ON (`eventos`.`ID_SERVICIO` = `servicios`.`ID`)
						GROUP BY `eventos`.`ID` ORDER BY eventos.id DESC LIMIT 4";
						$resultado = mysqli_query($conn, $query);
						$num_row = mysqli_num_rows($resultado);
						if ($num_row > 0){
							while($row = mysqli_fetch_array($resultado)){
						?>						
						<div class="d-flex border-bottom border-top py-3">
							<div class="form-check">
								<i class="mdi <?php echo $row['ICONO']?>"></i>
							</div>
							<div class="pl-2">								
								<span class="font-12 text-muted"><?php echo $row['FECHA'].' '.$row['HORA'].' - ' .$row['EVENTO'] ?></span>
								<p class="m-0 text-black"><?php echo $row['NOMBRE'].' - '.$row['TARJETA']?></p>
								<p class="m-0 text-black"><small> <?php echo $row['RESPUESTA']?></small></p>
							</div>
						</div>
						<?php
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xl-8 stretch-card grid-margin">
			<div class="card">
					<div class="card-body pb-0">
						<h4 class=" mb-0">Servicios Proximos a Vencer</h4>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table custom-table text-dark">
								<thead>
									<tr>
										<th>Fecha Factura</th>
										<th>Fecha Corte</th>
										<th>Identificacion</th>
										<th>Nombre</th>										
										<th>Estado Factura</th>
										<th>Estado Servicio</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query="SELECT servicios.`FECHA_FACTURA` ,servicios.`FECHA_CORTE` ,CONCAT(`clientes`.`TIPO_IDENTIFICACION`,clientes.`IDENTIFICACION`) AS IDENTIFICACION
									, `clientes`.`NOMBRE`, servicios.ESTADO_FACTURA, servicios.`ESTADO` ,DATEDIFF(servicios.`FECHA_CORTE`,CURDATE()) AS DIAS 
									FROM servicios INNER JOIN `clientes` ON (`servicios`.`ID_CLIENTE` = `clientes`.`ID`)
									HAVING (dias>=0 AND dias<=10) AND `servicios`.`ESTADO` ='ACTIVO' ORDER BY servicios.`FECHA_CORTE` ASC LIMIT 5;";
									$resultado = mysqli_query($conn, $query);
									$num_row = mysqli_num_rows($resultado);
									if ($num_row > 0){
                                        while($row = mysqli_fetch_array($resultado)){
									?>
									<tr>
										<td><i class="mdi mdi-import"></i> <?php echo $row['FECHA_FACTURA']?></td>
										<td><?php echo $row['FECHA_CORTE']?></td>										
										<td><?php echo $row['IDENTIFICACION']?></td>										
										<td><?php echo $row['NOMBRE']?></td>
										<td><?php echo $row['ESTADO_FACTURA']?></td>
										<td><?php echo $row['ESTADO']?></td>										
									</tr>
									<?php
										}
									}
									?>
										
								</tbody>
							</table>
						</div>
						<a class="text-black font-13 d-block pt-2 pb-2 pb-lg-0 font-weight-bold pl-4" href="servicios_listar.php">Ver Mas...</a>
						<br>
					</div>
				</div>
			</div>
			
		</div>
	</div>
    <?php
    require 'vistas/foot.php';
    /* FIN DE APLICACION*/
    //echo "<h1>hola Mundo 2</h1>";
}
//echo $usuario;
?>