<?php
if(!isset($_POST['idUser'])){
    header("Location:index.php");
    die();
}
$id=(int)$_POST['idUser'];
if($id==0){
    header("Location:index.php");
    die();
}
require_once __DIR__."/bbdd/conexion.php";
$q="delete from Registro_de_Fichaje where ID_Registro=?";
$stmt=mysqli_prepare($llave, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_close($llave);
header("Location:index.php");
