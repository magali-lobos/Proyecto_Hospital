<?php
$Server="LocalHost";/*para realizar la conexion ponemos el nombre del server, en este caso usamos MYSQL asi que utilizamos por defecto "LocalHost"*/ 
$User="root";/*el usuario por defecto es este */
$Pass="";/*No utilizamos contraseña */
$Base="mediapp";/*Y para poder completar ponemos el nombre de la base con la que vamos a conectar */

$Conexion=mysqli_connect($Server,$User,$Pass,$Base)or die("no se puede conectar");
