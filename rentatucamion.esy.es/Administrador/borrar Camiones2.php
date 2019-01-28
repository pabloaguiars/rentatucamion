<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
<head>
  <title>Borrado de un artículo</title>
</head>  
	<body>
		<?php
			error_reporting(0);
			include("indexadministrador.php");
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
				<center> <h1> Eliminar unidad </h1> </center>
			<?php
			$registro = mysqli_query($con,"select vin from camiones where coCamion = $_REQUEST[ID]") or die(mysqli_error($con));
			if ($reg=mysqli_fetch_array($registro))
			{
				mysqli_query($con,"delete from choferes where coCamion = $_REQUEST[ID]") or die(mysqli_error($con));    
				echo "La unidad con el VIN ".$reg['vin']." a sido eliminada";	  
			}      
			else
			{
				echo "No existe un unidad con dicho ID";
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