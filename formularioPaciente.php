<?php

$nombre=$_POST["nombrePaciente"];
$apellido=$_POST["apellidoPaciente"];
$causaPaciente=$_POST["causaPaciente"];
$llamada=$_POST["tipoLlamada"];
$areaHospital=$_POST["areaHospital"];
$origenLlamada=$_POST["origenLlamada"];
$pacienteAsistido=$_POST["pacienteAsistido"];
$profesionalAsignado=$_POST["profesionalAsignado"];

include "conexionmysql.php";

If (!$Conexion){
    die("Falló la conexión. ".mysqli_connect_error());
    exit();
}
else{
    echo "Conexión exitosa. ";
}

$Query = "INSERT INTO pacientes (id_paciente, nombrePaciente, apellidoPaciente, causaPaciente, tipoLlamada, areaHospital, origenLlamada, pacienteAsistido,  profesionalAsignado) 
 VALUES (0, '$nombre', '$apellido', '$causaPaciente', '$llamada', '$areaHospital', '$origenLlamada', '$pacienteAsistido',
 '$profesionalAsignado')";

echo $Query;

$Resultado= mysqli_query($Conexion,$Query);

echo "nombrePaciente: " . $nombre . "<br>";
echo "apellidoPaciente: " . $apellido . "<br>";
echo "causaPaciente: " . $causaPaciente . "<br>";
echo "tipoLlamada: " . $llamada . "<br>";
echo "areaHospital: " . $areaHospital . "<br>";
echo "origenLlamada: " . $origenLlamada . "<br>";
echo "pacienteAsistido: " . $pacienteAsistido . "<br>";
echo "profesionalAsignado: " . $profesionalAsignado . "<br>";

$stmt = $Conexion->prepare('SELECT id_llamada, tipo FROM llamada');
$stmt->execute();
$ResultadoG = $stmt->get_result();
$llamada = $ResultadoG->fetch_all(MYSQLI_ASSOC);

$stmt = $Conexion->prepare('SELECT id_area, nombreArea FROM area');
$stmt->execute();
$ResultadoB = $stmt->get_result();
$area = $ResultadoB->fetch_all(MYSQLI_ASSOC);

$stmt = $Conexion->prepare('SELECT id_atendido, atendido FROM atendido');
$stmt->execute();
$ResultadoL = $stmt->get_result();
$pacienteAsistido = $ResultadoL->fetch_all(MYSQLI_ASSOC);

?>

<form>

<label for="tipoLlamada">Llamada</label>
<select name="tipoLlamada" id="tipoLlamada">
  <?php foreach ($llamada as $llamada): ?>
    <option value="<?php echo $llamada['id_llamada']; ?>"><?php echo $llamada['tipo']; ?></option>
  <?php endforeach; ?>
</select>

<label for="areaHospital">area</label>
<select name="areaHospital" id="areaHospital">
  <?php foreach ($areaHospital as $areaHospital): ?>
    <option value="<?php echo $areaHospital['id_area']; ?>"><?php echo $areaHospital['nombreArea']; ?></option>
  <?php endforeach; ?>
</select>

<label for="pacienteAsistido">Atendido</label>
<select name="pacienteAsistido" id="pacienteAsistido">
  <?php foreach ($pacienteAsistido as $pacienteAsistido): ?>
    <option value="<?php echo $pacienteAsistido['id_atendido']; ?>"><?php echo $pacienteAsistido['atendido']; ?></option>
  <?php endforeach; ?>
</select>

<input type="submit" value="Enviar">
</form>