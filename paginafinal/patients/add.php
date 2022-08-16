<?php
    include('../config/config.php');
    include('patient.php');

    if (isset($_POST) && !empty($_POST)){
        $patient = new patient ();

        if ($_FILES['imagen']['name'] !== ''){
            $_POST['imagen'] = saveImage($_FILES);
          }
        $save = $patient->save($_POST);
        if ($save){
            $error = '<div class="alert alert-success" role="alert"> Paciente creado correctamente </div>';
        } else{
            $error = '<div class="alert alert-danger" role="alert" > Error al crear pciente </div>';
        }       
    }
    
  ?>
<!DOCTYPE html> 
<html>
   <head>
    <meta charset="UTF-8"/>
    <title> registrar sesión </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="archivosAdicionales/add/estilos/estilos.css">
   </head> 
   
   <body>

   <?php include('../menu.php') ?>

<?php 
      if (isset($error)){
        echo $error;
      }
?>
    <div class="container"> 
        <h2 class="text-center mb-2">Registrar sesión</h2>
        <form method="POST" enctype="multipart/form-data">

        <div class="row mb-2">
            <div class="col">
                <input type="text" name="nombres" id="nombres" placeholder="Nombres del paciente" class="form-control" />
            </div>
            <div class="col">
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del paciente" class="form-control" />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <input type="email" name="email" id="email" placeholder="Email del paciente" class="form-control" />
            </div>
            <div class="col">
                <input type="number" name="celular" id="celular" placeholder="Celular del paciente" class="form-control" />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <textarea name="enfermedades" id="enfermedades" placeholder="Enfermedades del paciente" class="form-control"></textarea>
            </div>
            <div class="col">
                <input type="text" name="duracionSesion" id="duracionSesion" placeholder="Duración de la Sesión " class="form-control" />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <input type="date" name="fecha" id="fecha" class="form-control">
            </div>
            <div class="col">
                <input type="file" name="imagen" id="imagen" required class="form-control" />
            </div>
        </div>
       <button class="btn btn-success"> Registrar</button>
        </form>
    </div> 
   </body>
</html>