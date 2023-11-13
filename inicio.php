<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CarmoBike</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../Practica1DWES_Eva/assets/css/estilos.css"/>
    </head>
    <body class="text-center">
        <h1 class="mt-5">CARMOBIKE</h1>
        
        <p>Seleccione los artículos que desea comprar</p>

        <form class="bg-light p-4 rounded" action="carrito.php" method="post">
            
            <label class="mb-3" for="producto">Productos</label><br>
            <select class="w-100 p-2 mb-2 rounded" name="articulos" id="articulos">
                <option disabled selected>Seleccione artículo...</option>
                <option value="casco">Casco Abus - 77,95 €</option>
                <option value="maillot">Maillot Gobik - 85,00 €</option>
                <option value="bicicleta orbea">Bicicleta Orbea - 2.490,00 €</option>
                <option value="bicicleta specialized">Bicicleta Specialized - 5.900,00 €</option>
                <option value="guantes">Guantes Monkey - 29,99 €</option>
                <option value="calcetines giro">Calcetines Giro - 14,90 €</option>
                <option value="calcetines gobik">Calcetines Gobik - 22,90 €</option>
            </select>

            <input class="w-100 p-2 mb-2 rounded" type="number" name="cantidad" placeholder="Cantidad" required><br><br>
            <input class="py-2 px-4 text-white rounded" type="submit" name="agregar_carrito" value="Agregar al carrito">
        </form>
    </body>
</html>