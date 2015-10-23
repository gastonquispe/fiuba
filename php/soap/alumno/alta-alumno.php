<?php
    require "../../../validar.php";
    require '../../../conexion.php';

	$title = "Alta de un nuevo alumno";

	$alumno_nombre = $_POST["alumno_nombre"];
	$alumno_apellido  = $_POST["alumno_apellido" ];
	$alumno_padron = $_POST["alumno_padron" ];
	$alumno_dni = $_POST["alumno_dni" ];
    $alumno_id_nac = $_POST["id_nac"];

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
		$mensaje = 'Se ha agregado el alumno';
	else
		$mensaje = 'Error al ingresar el alumno';


	echo $mensaje;

	mysqli_close($link);