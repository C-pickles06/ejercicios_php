<?php
session_start();
$producto_1 = "Mouse";
$producto_2 = "Teclado";
$producto_3 = "Audifonos";
$producto_4 = "Cargador";

#Array asociativo para albergar todos los productos con su precio

$hola = [
    ["id" => 1, "nombre" => $producto_1, "precio" => 1000],
    ["id" => 2, "nombre" => $producto_2, "precio" => 2000],
    ["id" => 3, "nombre" => $producto_3, "precio" => 3000],
    ["id" => 4, "nombre" => $producto_4, "precio" => 4000]
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Todos los objetos para agregar al carrito -->
    <h1>Carrito de compras</h1>
    <form method="post">
        <div>
            <p>Mouse<br>$<?= "{$producto_1}" ?></p>
            <input type="number" name="cantidad" type="number" min="1" value="1">
            <button type="submit" name="subir" value="1"> Enviar</button>
        </div>

        <div>
            <p>Teclado <br>$<?= "{$producto_2}" ?></p>
            <input type="number" name="cantidad" type="number" min="1" value="1">
            <button type="submit" name="subir" value="2"> Enviar</button>
        </div>
        <div>
            <p>Audifonos <br> $<?= "{$producto_3}" ?></p>
            <input type="number" name="cantidad" type="number" min="1" value="1">
            <button type="submit" name="subir" value="3"> Enviar</button>
        </div>
        <div>
            <p>Cargador <br> $<?= "{$producto_4}" ?></p>
            <input type="number" name="cantidad" type="number" min="1" value="1">
            <button type="submit" name="subir" value="4"> Enviar</button>
        </div>
        <br><br><button type="submit" name="calcular">Calcular</button>
    </form>
</body>

</html>


<?php
$id_buscado = $_POST['subir'];
echo $id_buscado;
if (isset($_POST['subir'])) {
    $resultado = array_filter($hola, function ($item) use ($id_buscado) {
    return $item["id"] == $id_buscado;
});
$nombre_prod = reset($resultado);
    $_SESSION['carrito']=[];
}

if ($nombre_prod) {
    echo "producto: " . $nombre_prod["nombre"] . " - $" . $nombre_prod["precio"];
}


/*




$iva= 0.19;
$cantidad= intval($_POST['cantidad']);

foreach ($hola as $i) {

    print_r($i);
}
$calcular = $producto_1 * $iva;
echo $calcular;
*/
?>