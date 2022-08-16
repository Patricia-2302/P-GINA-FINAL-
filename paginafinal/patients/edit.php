<?php
include('../config/config.php');
include('patient.php');
$p = new patient();
$data = mysqli_fetch_object($p->getOne($_GET['id']));
$date = new DateTime($data->fecha);

if (isset($_POST) && !empty($_POST)){
    $_POST['imagen'] = $data->imagen;
    if ($_FILES['imagen']['name'] !== ''){
      $_POST['imagen'] = saveImage($_FILES);
    }
$update = $p->update($_POST);
 if ($update){
    $error = '<div class="alert alert-success" role= "alert">pacinte modificadocorrectamente</div>';
 }else{
  $error = '<div class= "alert alert-danger" role="alert" > Error al modificar un pacinte </div>';
 }
}

?>
<!DOCTYPE thml>
<html>

    <head>
        <meta charset="UTF-8" />
        <title>modoficar pacinte </title>
        <link rel= "stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

<body>
    <?php include('menuadmi.php') ?>
    <div class="containar">
        <?php
        if (isset($error)){
           echo $error; 
        }
        ?>
          <div class="container"> 
        <h2 class= "text-center mb-5"> modificar paciente </h2>
      
       
        <form method="POST" enctype="multipart/form-data">

        <div class="row mb-2">
            <div class="col">
                <input type="text" name="nombres" id="nombres" placeholder="Nombres del paciente" class="form-control" value="<?= $data->nombres ?>" />
            </div>
                <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
            </div>
            <div class="col">
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del paciente" class="form-control" value="<?= $data->apellidos ?>"  />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <input type="email" name="email" id="email" placeholder="Email del paciente" class="form-control" value="<?= $data->email ?>"  />
            </div>
            <div class="col">
                <input type="number" name="celular" id="celular" placeholder="Celular del paciente" class="form-control" value="<?= $data->celular ?>" />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <textarea name="enfermedades" id="enfermedades" placeholder="Enfermedades del paciente" class="form-control"><?= $data->enfermedades ?> </textarea>
            </div>
            <div class="col">
                <input type="text" name="duracionSesion" id="duracionSesion" placeholder="Duración de la Sesión " class="form-control" value="<?= $data->duracionSesion ?>" />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <input type="date" name="fecha" id="fecha" class="form-control" value="<?= $date->format('Y-m-d') ?>">
            </div>
            <div class="col">
                <input type="file" name="imagen" id="imagen" class="form-control" />
            </div>
        </div>
       <button class="btn btn-success"> Registrar</button>
        </form>
    </div> 
</body>


</html>