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
			<center> <h1> Consulta chofer por ID </h1> </center>
			<?php
			$registro = mysqli_query($con, "select * from choferes where coChofer = $_REQUEST[codigo]") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{
				echo "ID Chofer: ".$reg['coChofer'];
				echo "<br>";
				echo "Nombre: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];
				echo "<br>";
				echo "Direccion: ".$reg['direccion'];
				echo "<br>";
				echo "Telefono: ".$reg['telefono'];
			}
			else
			{
				echo "No existe chofer con dicho ID";
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