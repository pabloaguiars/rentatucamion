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
			<center> <h1> Consulta cliente por ID </h1> </center>
			<?php
			$registro = mysqli_query($con, "select * from clientes where coChofer = $_REQUEST[codigo]") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{
				echo "ID Cliente: ".$reg['coCliente'];
				echo "<br>";
				echo "Nombre: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];
				echo "<br>";
				echo "Direccion: ".$reg['direccion'];
				echo "<br>";
				echo "Telefono: ".$reg['telefono'];
				echo "<br>";
				echo "Correo: ".$reg['correo'];
				echo "<br>";
				echo "Contrasena de la cuenta: ".$reg['contrasena'];
			}
			else
			{
				echo "No existe cliente con dicho ID";
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