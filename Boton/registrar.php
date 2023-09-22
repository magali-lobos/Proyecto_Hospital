<?php
// Establecer la zona horaria de Buenos Aires
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Obtener la fecha y hora del campo oculto
$fechahora = date('Y-m-d H:i:s');

include "conexionmysql.php";

if (!$Conexion) {
    die("Falló la conexión. " . mysqli_connect_error());
    exit();
} else {
    echo "Conexión exitosa. ";
}

// Insertar los datos en la base de datos
$sql = "INSERT INTO fechahora (fechahora) VALUES ('$fechahora')";

if ($Conexion->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error al registrar: " . $Conexion->error;
}
exit();

$Conexion->close();
?>