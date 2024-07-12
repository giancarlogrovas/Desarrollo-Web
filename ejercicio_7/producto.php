<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Demo</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </head>

    <body class="d-flex">
        <form class="m-auto card p-3" action="./components/registrarProducto.php" method="post">
            <h3 class="mb-3">Nuevo producto:</h3>
            <div class="input-group mb-3">
                <span class="input-group-text">Nombre</span>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Precio</span>
                <input type="number" class="form-control" name="precio" id="precio">
                <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Stock</span>
                <input type="number" class="form-control" name="stock" id="stock">
            </div>
            <div class="row m-0 py-3">
                <button type="submit" class="m-auto  w-fit btn btn-primary">Añadir</button>
                <a class="m-auto btn btn-secondary w-fit" href="misProductos.php">Cancelar</a>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>