<?php 
session_start();
$_SESSION['tarea']=[];
if (isset($_POST['tarea'])) {
    $a = $_POST['tarea'];
    $_SESSION['tarea'][]= $a;

}
?>
<form method="post">
    <p>Ingresa tu tarea</p>
    <input type="text" name="tarea">
    <input type="submit">
</form>
<ul>
<?php 
if(isset($_SESSION['tarea']))
?>
<?= "<li>{$a}</li>"?></ul>