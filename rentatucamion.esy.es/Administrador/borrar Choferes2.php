<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head>
		<title> Borrado </title>
	</head>  
	<body>
		<?php
			error_reporting(0);
			include("indexadministrador.php");
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
				<center> <h1> Eliminar un chofer </h1> </center>
			<?php
			$registro = mysqli_query($con,"select nombre, apPaterno, apMaterno from choferes where coChofer = $_REQUEST[ID]") or die(mysqli_error($con));
			if ($reg=mysqli_fetch_array($registro))
			{
				mysqli_query($con,"delete from choferes where coChofer = $_REQUEST[ID]") or die(mysqli_error($con)); 
				$chofer = 0;
				mysqli_query($con,"update camiones set chofer = '$chofer' where chofer = $_REQUEST[ID]") or die(mysqli_error($con));
				echo "El chofer elimando es: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];	  
			}      
			else
			{
				echo "No existe un chofer con dicho ID";
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