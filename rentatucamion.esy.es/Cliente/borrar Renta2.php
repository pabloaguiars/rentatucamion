<?php
	session_start();
	if(isset($_SESSION['IDCliente']))
	{
?>
<html>
	<head>
		<title> Borrado </title>
	</head>  
	<body>
		<?php
			error_reporting(0);
			include("indexusuario.php");
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
		?>
			<center> <h1> Borrar registro tabla clientes </h1> </center>
			<?php
			$registro = mysqli_query($con, "select * from clientes where noCliente = '$_SESSION[IDCliente]'") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{
				if($reg['contrasena'] == $_REQUEST['contrasena'])
				{
					$registro = mysqli_query($con,"select * from rentas where noRenta = $_REQUEST[renta]") or die(mysqli_error($con));
					if ($reg=mysqli_fetch_array($registro))
					{
						mysqli_query($con,"delete from rentas where noRenta = $_REQUEST[renta]") or die(mysqli_error($con)); 
						echo "La renta eliminada es la No. ".$reg['noRenta']." Solicitada para la fecha: ".$reg['anio']." ".$reg['mes']." ".$reg['dia'];	  
					}      
					else
					{
						echo "No existe una renta con dicho ID";
					}
				}
				else
				{
					echo "La contrasena no es correcta.";
				}
			}
			else
			{
				echo "No existe cliente con dicho ID.";
			}
				
			
			mysqli_close($con);
			echo "<hr>";
		?>  
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /index.html");
	}
?>