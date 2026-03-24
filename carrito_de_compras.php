<?php 
session_start();
$producto_1 = "Mouse";
$producto_2 = "Teclado";
$producto_3 = "Audifonos";
$producto_4 = "Cargador";
$hola = [["id"=> 1,"nombre" => $producto_1,"precio"=> 1000],["id"=> 2,"nombre"=> $producto_2, "precio" =>2000],["id"=> 3,"nombre" => $producto_3, "precio" => 3000]];
?>
<h1>Carrito de compras</h1>
<form method="post">
<div>
    <p>Mouse<br>$<?= "{$producto_1}" ?></p>
    <input type="number" name="cantidad" type="number" min="1">
    <input type="submit">
</div>
<!-- Todos los parrafos-->
 <div>
    <p>Teclado <br>$<?= "{$producto_2}" ?></p>
    <input type="number" name="cantidad" type="number" min="1">
    <input type="submit">
</div>
 <div>
    <p>Audifonos <br> $<?= "{$producto_3}" ?></p>
    <input type="number" name="cantidad" type="number" min="1">
    <input type="submit">
</div>
 <div>
    <p>Cargador <br> $<?= "{$producto_4}" ?></p>
    <input type="number" name="cantidad" type="number" min="1">
    <input type="submit">
 </div>
<br><br><button type="submit" name="calcular">Calcular</button>
</form>

<?php 
$iva= 0.19;
$cantidad= intval($_POST['cantidad']);

foreach ($hola as $i) {
    print_r($i);
}
#$calcular = $producto_1 * $iva;
#echo $calcular;
?>