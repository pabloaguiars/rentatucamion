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
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
			<center> <h1> Modificar unidad </h1> </center>
			<?php
			if(is_string($_REQUEST['marca']) & is_numeric($_REQUEST['capacidad']) & is_string($_REQUEST['modelo']) & is_numeric($_REQUEST['anio']) & is_string($_REQUEST['vin']))
			{
				if($_REQUEST['radio1'] == "1" or $_REQUEST['radio1'] == "2")
				{
					$marca = strtoupper($_REQUEST['marca']);
					$modelo = strtoupper($_REQUEST['modelo']);
					$vin = strtoupper($_REQUEST['vin']);
					mysqli_query($con, "update camiones set marca = '$marca', modelo = '$modelo', anio = '$_REQUEST[anio]', vin = '$vin', chofer = '$_REQUEST[chofer]', disponible = '$_REQUEST[radio1]', capacidad = $_REQUEST[capacidad] where coCamion = $_REQUEST[ID]") or die(mysqli_error($con));
					echo "Se modificaron los datos correctamente.";
				}
				else
				{
					echo "Disponibilidad no seleccionada";
				}
			}
			else
			{
				echo "No se rellenaron todos los campos.";
			}
			
			
			mysqli_close($con);
		?>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /rentatucamion.esy.es wamp/index2.html");
	}
?>