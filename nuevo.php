<?php
    session_start();
    function pintarErrores($sesion){
        if(isset($_SESSION[$sesion])){
            echo "<p style='color:red; text-size:smaller'>{$_SESSION[$sesion]}</p>";
            unset($_SESSION[$sesion]);
        }
    }
    if(isset($_POST['btn'])){
	
	// Recoger datos del formulario
    	$ID_Empleado = $_POST['ID_Empleado'];
   	 $Fecha = $_POST['Fecha'];
    	$Hora_Entrada = $_POST['Hora_Entrada'];
    	$Hora_Salida = $_POST['Hora_Salida'];
		
        $errores=false;
        require_once __DIR__."/bbdd/conexion.php";
	
	if($ID_Empleado < 0){
   	$errores = true;
    	$_SESSION['ID_Empleado'] = "El ID de empleado no puede ser negativo.";
	}
	
        if($errores){
            mysqli_close($llave); //para cerrar la sesion si hay errores
            header("Location:nuevo.php");
            die();
        }
	
        //------------------ Si estamos aqui no hay errores, guardamos los datos

        
        $q="insert into Registro_de_Fichaje(ID_Empleado, Fecha, Hora_Entrada, Hora_Salida) values(?, ?, ?, ?)";
        $stmt=mysqli_prepare($llave, $q);
        mysqli_stmt_bind_param($stmt, 'isss', $ID_Empleado, $Fecha, $Hora_Entrada, $Hora_Salida);
        mysqli_stmt_execute($stmt);
        //cerrar la conexion
        mysqli_close($llave);
        header("Location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h3><center>NUEVO FICHAJE</center></h3>
    <br>
    <fieldset style="width:50%; margin:auto">
    <form action="nuevo.php" method="POST">
        <label for="ID_Empleado">ID Empleado</label><br>
        <input type="number" name="ID_Empleado" id="ID_Empleado"/><br><br>
        <?php
        pintarErrores('ID_Empleado');
        ?>
        <label for="Fecha">Fecha</label><br>
        <input type="date" name="Fecha" id="Fecha" /><br><br>
        
        <label for="Hora_Entrada">Hora Entrada</label><br>
        <input type="time" name="Hora_Entrada" id="Hora_Entrada" /><br><br>
        
        <label for="Hora_Salida">Hora Salida</label><br>
        <input type="time" name="Hora_Salida" id="Hora_Salida" /><br><br>

        <input type="submit" name="btn" value="GUARDAR" />
    </form>
    </fieldset>
</body>
</html>
