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
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			$registros = mysqli_query($con, "select * from choferes") or die(mysqli_error($con));
		?>
			<center> <h1> Listado de choferes </h1> </center>
		<?php
			while($reg = mysqli_fetch_array($registros))
			{
				echo "ID Chofer: ".$reg['coChofer'];
				echo "<br>";
				echo "Nombre: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];
				echo "<br>";
				echo "Direccion: ".$reg['direccion'];
				echo "<br>";
				echo "Telefono: ".$reg['telefono'];
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