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
			<center> <h1> Consulta unidad por ID </h1> </center>
			<?php
			$registro = mysqli_query($con, "select * from camiones where coCamion = $_REQUEST[codigo]") or die(mysqli_error($con));
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
				echo "No existe chofer con dicho nombre";
			}
			
			mysqli_close($con);
		?>
	</body>
</head>
<?php
	}
	else
	{
		header("Location: /index2.html");
	}
?>