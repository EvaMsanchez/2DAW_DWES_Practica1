<?php

session_start();

if (!isset($_SESSION["totalPedidos"])) 
{
    $_SESSION["totalPedidos"] = 0;
}


if (isset($_SESSION["fecha"]) && $_SESSION["totalPedidos"] >0)
{
    $fecha = $_SESSION["fecha"];
}


if (isset($_POST["procesar_pedido"]) && count($_SESSION["carrito"]) >0)
{
    $_SESSION["totalPedidos"]++;

    $fecha = date("Y-m-d H:i:s");
    $_SESSION["fecha"] = $fecha;
}


if (isset($_SESSION["carrito"]))
{
    $_SESSION["carrito"] = [];
}


if (isset($_POST["borrar_historial"]))
{
    setcookie("historial", 0, time() - 3600);
    $_SESSION["totalPedidos"] = 0;
    $fecha = "";
}
else if(isset($_COOKIE["historial"]))
{
    setcookie("historial", $_SESSION["totalPedidos"], time() +3600);
}


if (isset($_POST["reducir_pedidos"]))
{
    if (isset($_SESSION["totalPedidos"]) && ($_SESSION["totalPedidos"]) >0)
    {
        $_SESSION["totalPedidos"]--;
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

        <p class="text-center mb-3">Historial de compras</p>

        <div class="rounded bg-light p-4 col-lg-4 pedidos">
            <p>Número total de pedidos: <?php echo $_SESSION["totalPedidos"]; ?> </p>

        <?php 
            if ($_SESSION["totalPedidos"] > 0) 
            { 
        
            echo "<p class='mb-1'>Último pedido con fecha: $fecha </p>";
            } 
        ?>

        </div>

        <form class="text-center" action="pedidos.php" method="post">
            <input class="py-2 px-4 me-5 mt-4 text-white rounded" type="submit" name="borrar_historial" value="Borrar historial">
        
            <input class="py-2 px-3 mt-4 text-white rounded" type="submit" name="reducir_pedidos" value="Reducir pedidos">
        </form>

    </body>
</html>