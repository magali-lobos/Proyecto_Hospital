<?php
$Server = "LocalHost";
$User = "root";
$Pass = "";
$Base = "mediapp";

// Crea una conexión
$Conexion=mysqli_connect($Server, $User, $Pass, $Base) or die ("No se puede conectar");