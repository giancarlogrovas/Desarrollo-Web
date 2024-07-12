<button?php 
$productos = [];
if (file_exists("./db/productos.json")) {
    $fileContent = file_get_contents("./db/productos.json");
    if ($fileContent) {
        $productos = json_decode($fileContent, true);
    }
}

?>


<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Demo</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    </head>

    <body>

        <?php include './components/navbar.php'; ?>

        <div class="d-flex full-height">
            <div class="m-auto card">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="carrito">
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-warning text-center">
                                    No hay productos en tu carrito<br><br>
                                    <a class="btn btn-warning" href="misProductos.php">Comprar</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="row m-o py-3">
                    <button class="m-auto btn btn-primary w-fit" type="button" onclick="pagar()">Pagar</button>
                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="./js/shopping-cart.js"></script>
        <script src="./js/payment.js"></script>
    </body>

</html>