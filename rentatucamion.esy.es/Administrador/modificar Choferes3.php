<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head>
		<title> Modificar </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexadministrador.php");
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
				<center> <h1> Modificar chofer </h1> </center>
			<?php
			if(is_string($_REQUEST['nombre']) & is_string($_REQUEST['apPaterno']) & is_string($_REQUEST['apMaterno']) & is_numeric($_REQUEST['telefono']))
			{
				if($_REQUEST['check1'] == 1)
				{
					if(is_string($_REQUEST['delegacion']) & is_string($_REQUEST['colonia']) & is_string($_REQUEST['calle']) & is_numeric($_REQUEST['numExt']))
					{				
						$delegacion = strtoupper($_REQUEST['delegacion']);
						$colonia = strtoupper($_REQUEST['colonia']);
						$calle = strtoupper($_REQUEST['calle']);
						$numExt = $_REQUEST['numExt'];
						$numInt = strtoupper($_REQUEST['numInt']);
						$direccion = "Calle ".$calle." Colonia ".$colonia." Delegacion ".$delegacion." #Ext ".$numExt." #Int ".$numInt;
					}
					else
					{
						echo "No se rellenaron correctamente los campos.";
					}
				}
				else
				{
					$direccion = $_REQUEST['direccion'];
				}
				$nombre = strtoupper($_REQUEST['nombre']);
				$apPaterno = strtoupper($_REQUEST['apPaterno']);
				$apMaterno = strtoupper($_REQUEST['apMaterno']);
				mysqli_query($con, "update choferes set nombre = '$nombre', apPaterno = '$apPaterno', apMaterno = '$apMaterno', telefono = '$_REQUEST[telefono]', direccion = '$direccion' where coChofer = $_REQUEST[ID]") or die(mysqli_error($con));
				echo "Se modificaron los datos correctamente.";
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