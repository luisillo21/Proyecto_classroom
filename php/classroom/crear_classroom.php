<?php
	SESSION_START();
	if(!isset($_SESSION['_user']))
	{
		header("location:../../index.php");
	}
	else
	{
		$GLOBALS['program_id'] = 201; // Personas
		include("../conexion.php");
		include("../valida_permisos.php");	
		if(valida_permisos($conexion,"A")!=1)
		{
		 header('Location: ../mensaje.php?mensaje=Función No Permitida a Usuario&programa=../php/personas/index.php&tipo=danger');
		}
	}
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	



	</head>
	<header class="bg-dark">
		<div class="row">
			<h2 style="text-align:center"><?php echo $GLOBALS['program_name']; ?></h2>
		</div>
	</header>
	<body>
		<div class="container">
			<div class="row">
				<h4 style="text-align:center">Formulario de creacion de una aula virtual</h4>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cls_nombre" name="cls_nombre" placeholder="Nombre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cls_descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cls_descripcion" name="cls_descripcion" placeholder="Escribe una descripcion de tu aula virtual" required>
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>