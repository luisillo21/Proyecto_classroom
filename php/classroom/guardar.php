<?php
	session_start();
	require '../conexion.php';
	error_reporting(E_ERROR | E_PARSE);
	$nombre = $_POST['cls_nombre'];
	$descripcion = $_POST['cls_descripcion'];
	date_default_timezone_set('GMT/UTC');
	$fecha = date('Y-m-d');
	$usuario = $_SESSION["_user"];
	



	$sql = "INSERT INTO cls_classroom (nombre, descripcion,fecha_creacion,autor,estado) VALUES ('".$nombre."', '".$descripcion."', '".$fecha."', '". $usuario ."', 'A')";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php; if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
