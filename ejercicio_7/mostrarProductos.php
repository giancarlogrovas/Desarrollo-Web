<?php
    $productos = [];
    
    if (file_exists("productos.json")) {
        $fileContent = file_get_contents("productos.json");
        if ($fileContent) {
            $productos = json_decode($fileContent, true);
        }
    }

    if (is_array($productos) && count($productos) > 0) {
        echo '<table border="1">';
        echo '<tr><th>Nombre</th><th>Precio</th><th>Stock</th></tr>';
        foreach ($productos as $producto) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($producto['nombre']) . '</td>';
            echo '<td>' . htmlspecialchars($producto['precio']) . '</td>';
            echo '<td>' . htmlspecialchars($producto['stock']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No hay productos disponibles.</p>';
    }
?>