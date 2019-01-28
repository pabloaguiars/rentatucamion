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
				<center> <h1> Consulta cliente por nombre </h1> </center>
			<?php
			$registros = mysqli_query($con, "select * from clientes where nombre = '$_REQUEST[nombre]'") or die(mysqli_error($con));
			if(empty($registros))
			{
				echo "No existe cliente con dicho nombre";
				echo "<br>";
				echo "<hr>";
			}
			else
			{
				while($reg = mysqli_fetch_array($registros))
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
					echo "<hr>";
				}
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