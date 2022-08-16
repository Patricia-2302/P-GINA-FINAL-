<?php
include('../config/config.php');
include('../config/database.php');

class patient{
    public $conn; /* LLAMO LA CONEXION DE MI BASE DE DATOS */

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conn = $db->connectToDatabase();
    }

function save($params){
$nombres = $params['nombres'];
$apellidos = $params['apellidos'];
$email = $params['email'];
$celular = $params['celular'];
$enfermedades = $params['enfermedades'];
$duracionSesion = $params['duracionSesion'];
$imagen = $params['imagen'];
$fecha = $params['fecha'];

$insert = "INSERT INTO pacientes VALUES (NULL, '$nombres', '$apellidos', '$email', '$celular', '$enfermedades', '$duracionSesion', '$imagen', '$fecha')";

return mysqli_query($this->conn, $insert);
}

function getAll(){
$sql = " SELECT * FROM pacientes ORDER BY fecha ASC ";
return mysqli_query($this->conn, $sql); 
}
function getOne($id){
    $sql = "SELECT * FROM pacientes WHERE id = $id";
    return mysqli_query($this->conn, $sql);
} 


function update($params){
    $nombres = $params['nombres'];
    $apellidos = $params['apellidos'];
    $email = $params['email'];
    $celular = $params['celular'];
    $enfermedades = $params['enfermedades'];
    $duracionSesion = $params['duracionSesion'];
    $imagen = $params['imagen'];
    $fecha = $params['fecha'];
    $id = $params['id'];


    $update = " UPDATE pacientes SET nombres='$nombres', apellidos='$apellidos', email='$email', celular='$celular', enfermedades='$enfermedades', duracionSesion='$duracionSesion', imagen='$imagen', fecha='$fecha', id='$id'";
    return mysqli_query($this->conn, $update);
    }

    function remove($id){
        $remove ="DELETE FROM pacientes WHERE id = $id";
        return mysqli_query($this->conn, $remove);
    }


}

 