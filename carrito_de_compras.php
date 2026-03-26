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

if (isset($_POST['subir'])) {
    $id_buscado = $_POST['subir'];
    $cantidad = intval($_POST['cantidad']);

    $resultado = array_filter($hola, function ($item) use ($id_buscado) {
        return $item['id'] == $id_buscado;
    });
    $producto_e = reset($resultado);

    if ($producto_e) {
        if (isset($_SESSION['Carrito'][$id_buscado])) {
            $_SESSION['carrito'][$id_buscado]['cantidad'] += $cantidad;
        } else {
            $_SESSION['carrito'][$id_buscado] = [
                'id' => $producto_e['id'],
                'nombre' => $producto_e['nombre'],
                'precio' => $producto_e['precio'],
                'cantidad' => $cantidad,
            ];
        }
    }
}
echo "Producto agregado: " . $producto_e["nombre"] . " - $" . $producto_e["precio"] . " x" . $cantidad . "<br>";

if(!empty($_SESSION['carrito'])){
    echo "<h2>Carrito actual</h2>";
    foreach($_SESSION['carrito'] as $item){
        echo $item['nombre']. "- $". $item['precio']. " X". $item['cantidad']. " = $".$item['cantidad'] . "<br>";
    }
}
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
        <?php foreach ($hola as $producto): ?>
            <div>
                <p><?= $producto["nombre"] ?><br>$<?= $producto["precio"] ?></p>
                <input type="number" name="cantidad" type="number" min="1" value="1">
                <button type="submit" name="subir" value="<?= $producto["id"] ?>"> Enviar</button>
            </div>
        <?php endforeach; ?>
        <br><br><button type="submit" name="calcular">Calcular</button>
    </form>
</body>

</html>