
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
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
			<center> <h1> Consulta unidad por VIN </h1> </center>
			<?php
			$registro = mysqli_query($con, "select * from camiones where vin = '$_REQUEST[vin]'") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{
				echo "Unidad: ";
				if($reg['disponible'] <> 1)
					echo "No Disponible";
				else
					echo "Disponible";
				echo "<br>";
				echo "ID Camion: ".$reg['coCamion'];
				echo "<br>";
				echo "Marca: ".$reg['marca']." Modelo: ".$reg['modelo']." Anio: ".$reg['anio'];
				echo "<br>";
				echo "Capacidad: ".$reg['capacidad']." personas";
				echo "<br>";
				echo "VIN: ".$reg['vin'];
			}
			else
			{
				echo "No existe unidad con dicho VIN";
			}
			
			mysqli_close($con);
		?>
	</body>
</head>
<?php
	}
	else
	{
		header("Location: /rentatucamion.esy.es wamp/index2.html");
	}
?>