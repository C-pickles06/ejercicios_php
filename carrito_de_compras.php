<?php 
session_start();
$producto_1 = "Mouse";
$producto_2 = "Teclado";
$producto_3 = "Audifonos";
$producto_4 = "Cargador";

#Array asociativo para albergar todos los productos con su precio

$hola = [["id"=> 1,"nombre" => $producto_1,"precio"=> 1000],
["id"=> 2,"nombre"=> $producto_2, "precio" =>2000],
["id"=> 3,"nombre" => $producto_3, "precio" => 3000]];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Carrito de compras</h1>
<form method="post">
<div>
    <p>Mouse<br>$<?= "{$producto_1}" ?></p>
    <input type="number" name="cantidad" type="number" min="1">
    <input type="hidden" value="1" name="subir">
    <input type="submit">
</div>
<!-- Todos los parrafos-->
 <div>
    <p>Teclado <br>$<?= "{$producto_2}" ?></p>
    <input type="number" name="cantidad" type="number" min="1">
    <input type="hidden" value="2" name="subir">
    <input type="submit">
</div>
 <div>
    <p>Audifonos <br> $<?= "{$producto_3}" ?></p>
    <input type="number" name="cantidad" type="number" min="1">
    <input type="hidden" value="3" name="subir">
    <input type="submit">
</div>
 <div>
    <p>Cargador <br> $<?= "{$producto_4}" ?></p>
    <input type="number" name="cantidad" type="number" min="1">
    <input type="hidden" value="4" name="subir">
    <input type="submit">
 </div>
<br><br><button type="submit" name="calcular">Calcular</button>
</form>
</body>
</html>


<?php 
$idBuscado = isset($_POST['subir']) ? (int)$_POST['id'] : 1;
$resultado = array_filter($hola, function ($item) use ($idBuscado){
    return $item["id"] == $idBuscado;
});
$nombre_prod= reset($resultado);
$_SESSION['carrito']=[];
if($nombre_prod){
    echo "producto: ".$nombre_prod["nombre"]. " - $".$nombre_prod["precio"];
}
/*
$iva= 0.19;
$cantidad= intval($_POST['cantidad']);

foreach ($hola as $i) {

    print_r($i);
}
#$calcular = $producto_1 * $iva;
#echo $calcular;
*/
?>