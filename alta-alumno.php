<?php
	require "validar.php";

	$title = "Alta de un nuevo alumno";

	$alumno_nombre = $_POST["alumno_nombre"];
	$alumno_apellido  = $_POST["alumno_apellido" ];
	$alumno_padron = $_POST["alumno_padron" ];
	$alumno_dni = $_POST["alumno_dni" ];
    $alumno_id_nac = $_POST["id_nac"];

	require 'conexion.php';

	$sql = "INSERT INTO alumnos VALUES (
				'" . $alumno_padron . "',
				'" . $alumno_nombre . "',
				'" . $alumno_apellido . "',
				'" . $alumno_dni . "',
				'" . $alumno_id_nac . "'
			)";

	 mysqli_query($link, $sql);

	 $chequeo = mysqli_affected_rows($link);

	if ($chequeo == 1)
		$mensaje = 'Se ha agregado el alumno:';
	else
		$mensaje = 'Error al ingresar el alumno:';

    // OBTENGO NOMBRE DE LA NACIONALIDAD
    $sql2 = "SELECT nacionalidad FROM nacionalidades WHERE id_nac ='" . $alumno_id_nac . "'";
    $resultado2 = mysqli_query($link, $sql2);
    $fila2 = mysqli_fetch_array($resultado2);
    $alumno_nacionalidad = $fila2["nacionalidad"];

?>


<body>

	<h1><?php echo $title ; ?></h1>

	<h3><?php echo $mensaje ?></h3>

	<table>

		<tr>
			<td>NOMBRE</td>
			<td><?php echo $alumno_nombre ?></td>
		</tr>
		<tr>
			<td>APELLIDO</td>
			<td><?php echo $alumno_apellido ?></td>
		</tr>
		<tr>
			<td>PADRON</td>
			<td><?php echo $alumno_padron ?></td>
		</tr>
		<tr>
			<td>DNI</td>
			<td><?php echo $alumno_dni ?></td>
		</tr>
        <tr>
			<td>NACIONALIDAD</td>
			<td><?php echo $alumno_nacionalidad ?></td>
		</tr>
		<tr>
			<th colspan="2">
				<a href = "form-alta-alumno.php">
					AGREGAR OTRO ALUMNO
				</a>
			</th>
		</tr>
		<tr>
			<th colspan="2">
				<a href = "admin.php">
					INICIO
				</a>
			</th>
		</tr>
	</table>

</body>
</html>

<?php
	mysqli_close($link);
?>