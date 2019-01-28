<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head> 
		<title> Listado </title> 
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexadministrador.php");
			$contador = 0;
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			$registros = mysqli_query($con, "select cam.coCamion, cam.chofer, dispo.dispoTexto, marca, modelo, capacidad, anio, vin, cho.coChofer, nombre, apPaterno, apMaterno from camiones as cam inner join choferes as cho on cho.coChofer = cam.chofer inner join disponibilidadunidad as dispo on dispo.DispoNum = cam.Disponible") or die(mysqli_error($con));
		?>
			<center> <h1> Listado de unidades </h1> </center>
		<?php
			while($reg = mysqli_fetch_array($registros))
			{
				
				echo "Unidad: ".$reg['dispoTexto'];
				echo "<br>";
				echo "ID Camion: ".$reg['coCamion'];
				echo "<br>";
				echo "Marca: ".$reg['marca']." Modelo: ".$reg['modelo']." Anio: ".$reg['anio'];
				echo "<br>";
				echo "Capacidad: ".$reg['capacidad']." personas";
				echo "<br>";
				echo "VIN: ".$reg['vin'];
				echo "<br>";
				echo "ID de chofer a cargo: ".$reg['chofer']."  Nombre: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];
				echo "<br>";
				echo "<hr>";
			}
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