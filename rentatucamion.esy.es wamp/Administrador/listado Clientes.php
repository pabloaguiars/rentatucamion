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
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			$registros = mysqli_query($con, "select * from clientes") or die(mysqli_error($con));
		?>
			<center> <h1> Listado de clientes </h1> </center>
		<?php
			while($reg = mysqli_fetch_array($registros))
			{
				echo "ID Cliente: ".$reg['noCliente'];
				echo "<br>";
				echo "Nombre: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];
				echo "<br>";
				echo "Direccion: ".$reg['direccion'];
				echo "<br>";
				echo "Telefono: ".$reg['telefono'];
				echo "<br>";
				echo "Correo: ".$reg['correo'];
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
		header("Location: /rentatucamion.esy.es wamp/index2.html");
	}
?>