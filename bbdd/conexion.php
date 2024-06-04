<?php
//crearemos la conexion a la bbdd fichado_empleados con el usuario "adminoficina"
try{
    $llave=mysqli_connect("192.168.3.3:3306", "adminoficina", "adminproyecto", "fichado_empleados");
}catch(Exception $ex){
    die("Error en la conexion: ".$ex->getMessage());
}
