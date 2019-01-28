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
			<?php
				error_reporting(0);
				include("indexusuario.php");
				$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
			$registro = mysqli_query($con,"select nombre, apPaterno, apMaterno, contrasena from clientes where noCliente = '$_SESSION[IDCliente]'") or die(mysqli_error($con));
			if ($reg=mysqli_fetch_array($registro))
			{
				if($reg['contrasena'] == $_REQUEST['contrasena'])
				{
					mysqli_query($con,"delete from clientes where coCliente = '$_SESSION[IDCliente]'") or die(mysqli_error($con)); 
					// Al eliminar un cliente debe de cancelarce el pedido
					// $chofer = 0;
					mysqli_query($con,"delete from rentas where cliente = '$_SESSION[IDCliente]'") or die(mysqli_error($con));
					header("Location: /rentatucamion.esy.es wamp/index.php")	
				}
				else
				{
					echo "Contrasena incorrecta.";
				}
			}      
			else
			{
				echo "No existe un usuario con dicho ID";
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