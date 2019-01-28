<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head>
		<title> Respuesta </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexadministrador.php");
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
			<center> <h1> Dar de alta un chofer </h1> </center>
			<?php
			if(is_string($_REQUEST['nombre']) & is_string($_REQUEST['apPaterno']) & is_string($_REQUEST['apMaterno']) & is_string($_REQUEST['telefono']) & is_string($_REQUEST['delegacion']) & is_string($_REQUEST['colonia']) & is_string($_REQUEST['calle']) & is_numeric($_REQUEST['numExt']))
			{
				$nombre = strtoupper($_REQUEST['nombre']);
				$apPaterno = strtoupper($_REQUEST['apPaterno']);
				$apMaterno = strtoupper($_REQUEST['apMaterno']);
				$delegacion = strtoupper($_REQUEST['delegacion']);
				$colonia = strtoupper($_REQUEST['colonia']);
				$calle = strtoupper($_REQUEST['calle']);
				$delegacion = $_REQUEST['delegacion'];
				$colonia = $_REQUEST['colonia'];
				$calle = $_REQUEST['calle'];
				$numExt = $_REQUEST['numExt'];
				$numInt = $_REQUEST['numInt'];
				$direccion = "Calle ".$calle." Colonia ".$colonia." Delegacion ".$delegacion." #Ext ".$numExt." #Int ".$numInt;
				
				mysqli_query($con,"insert into choferes(nombre, apPaterno, apMaterno, telefono, direccion) values ('$nombre','$apPaterno','$apMaterno','$_REQUEST[telefono]','$direccion')") or die(mysqli_error($con));
				echo "Chofer dado de alta en el sistema.";
			}
			else
			{
				echo "No se rellenaron correctamente los campos.";
			}
			mysqli_close($con);
		?>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /index2.html");
	}
?>