<?php

include_once 'config.php';

//Crear conexion
//mysquli(nombre_servidor, host, contraseña, nombre_basedatos)
$conn = new mysqli($DB_data['server'],$DB_data['connInfo']['UID'],$DB_data['connInfo']['PWD'],$DB_data['Database']);

//chequeo de conexion
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(!$conn->set_charset("utf8")){
    $conn->close();
    die("Error loading character set utf8: %d\n".$conn->error);
}

$query = "select * from lenguaje";

$result = $conn->query($query);

$data = [];

if($result->num_rows > 0){
    while($row  = $result->fetch_assoc()){
        array_push($data,$row);
    }
}

echo json_encode($data);
$conn->close();
 
?>