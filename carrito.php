<?php

session_start();

if (!isset($_SESSION["carrito"])) 
{
    $_SESSION["carrito"] = [];
}


$preciosArticulos = [
    "casco" => 77.95,
    "maillot" => 85.00,
    "bicicleta orbea" => 2490.00,
    "bicicleta specialized" => 5900.00,
    "guantes" => 29.99,
    "calcetines giro" => 14.90,
    "calcetines gobik" => 22.90
];


if (isset($_POST["agregar_carrito"]))
{
    $articulo = $_POST["articulos"];
    $cantidad = $_POST["cantidad"];

    if (isset($_SESSION["carrito"][$articulo])) 
    {
        $_SESSION["carrito"][$articulo] += $cantidad;
    } 
    else 
    {
        $_SESSION["carrito"][$articulo] = $cantidad;
    }
}

?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CarmoBike</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../Practica1DWES_Eva/assets/css/estilos.css"/>
    </head>
    <body>
        <h1 class="mt-5 text-center">CARMOBIKE</h1>

        <p class="text-center">Carrito de compras</p>

        <table class="mt-3 mb-4 text-center bg-light">
            <tr class="text-white">
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio/ud.</th>
                <th>Total Producto</th>
            </tr>

        <?php

            if (isset($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) 
            {
                $importeTotal = 0;

                foreach ($_SESSION["carrito"] as $articulo => $cantidad) 
                {
                    $precio = $preciosArticulos[$articulo];
                    $totalProducto = $cantidad * $precio;
                    $importeTotal += $totalProducto; 

                    echo "<tr>";
                        echo "<td>$articulo</td>";
                        echo "<td>$cantidad</td>";
                        echo "<td>" . number_format($precio, 2) . " €</td>";
                        echo "<td>" . number_format($totalProducto, 2) . " €</td>";
                    echo "</tr>";
                   
                }
                echo "</table>";
                echo "<p class='text-center'>Importe total de la compra: " . number_format($importeTotal, 2) . " €</p>";
  
            }
            else
            {
                echo "</table>";
                echo "<p class='text-center'>El carrito está vacío.</p>";
            }
            
        ?>

        <div class="d-flex justify-content-between">

        <form action="inicio.php" method="post">
            <input class="py-2 px-4 text-white rounded m-2 float-start" type="submit" value="Seguir comprando">
        </form>

        <?php
            if (isset($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) 
            {
                //Solo muestra el botón "Procesar pedido" si hay artículos en el carrito.
                echo '<form class="float-end" action="pedidos.php" method="post">';
                echo '<input class="py-2 px-4 text-white rounded m-2" type="submit" name="procesar_pedido" value="Procesar pedido">';
                echo '</form>';
            }
        ?>
        
        </div>
    </body>
</html>