<?php
include_once 'config.php';

//Crear conexion
//mysquli(nombre_servidor, host, contraseña, nombre_basedatos)
$conn = new mysqli($DB_data['server'],$DB_data['connInfo']['UID'],$DB_data['connInfo']['PWD'],$DB_data['Database']);

//chequeo de conexion
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>