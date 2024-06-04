<?php
    require_once __DIR__."/bbdd/conexion.php";
    $q="select * from Registro_de_Fichaje order by ID_Registro desc";
    $datos=mysqli_query($llave, $q);
    mysqli_close($llave);
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
    <h3><center>FICHAJES</center></h3>
    <center><a href="nuevo.php"><button>NUEVO</button></a></center><br>
    <table align="center" border='2' cellpadding='2'>
        <thead>
            <th>ID REGISTRO</th>
            <th>ID EMPLEADO</th>
            <th>FECHA</th>
            <th>HORA ENTRADA</th>
            <th>HORA SALIDA</th>
        </thead>
        <tbody>
            <?php
                foreach($datos as $item){
                    echo <<<TXT
                    <tr>
                        <td>{$item['ID_Registro']}</td>
                        <td>{$item['ID_Empleado']}</td>
                        <td>{$item['Fecha']}</td>
                        <td>{$item['Hora_Entrada']}</td>
                        <td>{$item['Hora_Salida']}</td>
                        <td>
                        <form action='delete.php' method='POST'>
                        <input type='hidden' name='idUser' value='{$item['ID_Registro']}' />
                        <button type='submit'>Borrar</button>
                        </form>
                        </td>
                    </tr>
                    TXT;
                }
            ?>
        </tbody>
    </table>
</body>
</html>
