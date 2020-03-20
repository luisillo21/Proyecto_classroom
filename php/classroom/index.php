<?php
  SESSION_START();
  if(!isset($_SESSION['_user']))
  {
    header("location:../../index.php");
  }
  else
  {
    $GLOBALS['program_id'] = 201; // aula virtual
    include("../conexion.php");
    include("../valida_permisos.php");  
    if(valida_permisos($conexion,"A")!=1)
    {
     header('Location: ../mensaje.php?mensaje=Función No Permitida a Usuario&programa=../php/personas/index.php&tipo=danger');
    }
  }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Bienvenidos</title>
    <!-- BOOTSTRAP 4  -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <style type="text/css">
      
      .posicion{
          margin-left: 62%;
      }

      .boton{

        margin-left: 10px;
        margin-right: 10px; 
      }



    </style>
  </head>
  <body>

    <!-- NAVIGATION  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Aula virtual</a>
            <div class="posicion">
            <a href="crear_classroom.php"class="btn btn-success boton" name="">Crear Classroom</a>
            <a href="../menu.php" class="btn btn-danger boton" name="">Volver a la pantalla principal</a>
            </div>
      </div>
    </nav>

 <div class="row py-4 p-2">

  <?php 
  if (!$conexion) {
    echo "Error" . mysqli_error();
    exit();
  }
  $consulta = "SELECT * FROM cls_classroom where estado = 'A'";

  if ($result= mysqli_query($conexion,$consulta)) {
    while ($data = mysqli_fetch_assoc($result)) { 
        echo '<div class="col-sm-3">';
        echo '<div class="card shadow-lg p-3 mb-5 rounded bg-dark">';
        echo '<div class="card-head py-4" style="background-image: url(../../imagenes/2.jpg);">';
        echo "<h4 class='card-title text-center bold text-light bold'><strong>". $data["nombre"]. "</strong></h4>";
        echo '</div>';
        echo '<div class="card-body" >';
        echo '<p class="card-text text-light h5 text-center">'. $data["descripcion"]  .'</p>';
        echo '<hr style="background-color:white;" />';
        echo '<p class="card-text text-light h5 text-center">Autor: '. $data["autor"]  .'</p>';
        echo '<p class="card-text text-light h5 text-center">Fecha: '. $data["fecha_creacion"]  .'</p>';
        echo '<a href="post_clasroom.php" class="btn btn-primary btn-block bg-success">Entrar aula virtual</a> </div>';
        echo '</div>';
        echo '</div>';
     } 
    }
 ?>


  </div>

<div class="modal fade" id="mostrar_modal" role="dialog">


</div>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <!-- Frontend Logic -->
    <script src="app.js"></script>
  </body>

</html>
