<?php

$nombre=$_POST["nombrePaciente"];
$apellido=$_POST["apellidoPaciente"];
$DNI=$_POST["DNI"];
$fecNac=$_POST["fecNac"];
$nacionalidad=$_POST["nacionalidad"];
$sexo=$_POST["sexo"];
$telefono=$_POST["telefono"];
$barrio=$_POST["barrio"];
$domicilio=$_POST["domicilio"];
$antecedentesMedicos=$_POST["antecedentesMedicos"];
$antecedentesInteres=$_POST["antecedentesInteres"];
$altura=$_POST["altura"];
$peso=$_POST["peso"];


include "conexionmysql.php";

If (!$Conexion){
    die("Falló la conexión. ".mysqli_connect_error());
    exit();
}
else{
    echo "Conexión exitosa. ";
}

$Query = "INSERT INTO fichaMedica (id_ficha, nombrePaciente, apellidoPaciente, DNI, fecNac, nacionalidad, sexo,
 telefono, barrio, domicilio, antecedentesMedicos, antecedentesinteres, altura, peso ) 
 VALUES (0, '$nombre', '$apellido', '$DNI', '$fecNac', '$nacionalidad', '$sexo', '$telefono', '$barrio',
 '$domicilio',  '$antecedentesMedicos', '$antecedentesInteres', '$altura', '$peso')";

echo $Query;

$Resultado= mysqli_query($Conexion,$Query);

echo "nombrePaciente: " . $nombre . "<br>";
echo "apellidoPaciente: " . $apellido . "<br>";
echo "DNI: " . $DNI . "<br>";
echo "fecNac: " . $fecNac . "<br>";
echo "nacionalidad: " . $nacionalidad . "<br>";
echo "sexo: " . $sexo . "<br>";
echo "telefono: " . $telefono . "<br>";
echo "barrio: " . $barrio . "<br>";
echo "domicilio: " . $domicilio . "<br>";
echo "antecedentesMedicos: " . $antecedentesMedicos . "<br>";
echo "antecedentesInteres: " . $antecedentesInteres . "<br>";
echo "altura: " . $altura . "<br>";
echo "peso: " . $peso . "<br>";


$stmt = $Conexion->prepare('SELECT id_sexo, tipoSexo FROM sexo');
$stmt->execute();
$ResultadoG = $stmt->get_result();
$sexo = $ResultadoG->fetch_all(MYSQLI_ASSOC);

$stmt = $Conexion->prepare('SELECT id_barrio, nombreBarrio FROM barrios');
$stmt->execute();
$ResultadoB = $stmt->get_result();
$barrio = $ResultadoB->fetch_all(MYSQLI_ASSOC);

?>

<form>

<label for="sexo">Sexo</label>
<select name="sexo" id="sexo">
  <?php foreach ($sexo as $sexo): ?>
    <option value="<?php echo $sexo['id_sexo']; ?>"><?php echo $sexo['sexo']; ?></option>
  <?php endforeach; ?>
</select>

<label for="barrio">Barrio</label>
<select name="barrio" id="barrio">
  <?php foreach ($barrio as $barrio): ?>
    <option value="<?php echo $barrio['id_barrio']; ?>"><?php echo $barrio['nombreBarrio']; ?></option>
  <?php endforeach; ?>
</select>



<input type="submit" value="Enviar">
</form>