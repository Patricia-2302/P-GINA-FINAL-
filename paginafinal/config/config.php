<?php
include_once('function.php'); /* Conexion del archivo de funciones */

if(!defined('ROOT')){
    define("ROOT", 'http://'.$_SERVER['HTTP_HOST'].getFolderProject());
} 