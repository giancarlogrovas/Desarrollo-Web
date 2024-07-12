<?php

    //var_dump($_POST);
    $path = "../db/productos.json";

    $productos = [];
    if (file_exists($path)) {
        $fileContent = file_get_contents($path);
        if ($fileContent) {
            $productos = json_decode($fileContent, true);
        }
    }

    if (!is_array($productos)) {
        $productos = [];
    }

    $nuevoProducto = array(
        "nombre" => $_POST["nombre"],
        "precio" => $_POST["precio"],
        "stock" => $_POST["stock"],
    );

    $productos[] = $nuevoProducto;

    file_put_contents($path, json_encode($productos, JSON_PRETTY_PRINT));

?>

<script>
    location.href="../misProductos.php";
</script>