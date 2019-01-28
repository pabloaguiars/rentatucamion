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
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
				<center> <h1> Eliminar una renta </h1> </center>
			<?php
			$registro = mysqli_query($con,"select * from rentas where noRenta = $_REQUEST[ID]") or die(mysqli_error($con));
			if ($reg=mysqli_fetch_array($registro))
			{
				mysqli_query($con,"delete from rentas where noRenta = $_REQUEST[ID]") or die(mysqli_error($con)); 
				echo "La renta eliminada es la No. ".$reg['noRenta'];	  
			}      
			else
			{
				echo "No existe una renta con dicho ID";
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