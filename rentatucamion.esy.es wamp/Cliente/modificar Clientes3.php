<?php
	session_start();
	if(isset($_SESSION['IDCliente']))
	{
?>
<html>
	<head>
		<title> Modificar </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexusuario.php");
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
				<center> <h1> Modificar tabla choferes </h1> </center>
			<?php
			$registro = mysqli_query($con, "select * from clientes where noCliente = '$_SESSION[IDCliente]'") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{
				if($reg['contrasena'] == $_REQUEST['contrasena'])
				{
					if($_REQUEST['contrasena1'] == $_REQUEST['contrasena2'])
					{
						if(is_string($_REQUEST['nombre']) & is_string($_REQUEST['apPaterno']) & is_string($_REQUEST['apMaterno']) & is_numeric($_REQUEST['telefono']) & is_string($_REQUEST['contrasena']) & substr_count($_REQUEST['correo'], '@') == 1)
						{
							if($_REQUEST['check1'] == 1)
							{ 
								if(is_string($_REQUEST['delegacion']) & is_string($_REQUEST['colonia']) & is_string($_REQUEST['calle']) & is_numeric($_REQUEST['numExt']))
								{				
									$delegacion = strtoupper($_REQUEST['delegacion']);
									$colonia = strtoupper($_REQUEST['colonia']);
									$calle = strtoupper($_REQUEST['calle']);
									$numExt = $_REQUEST['numExt'];
									$numInt = strtoupper($_REQUEST['numInt']);;
									$direccion = "Calle ".$calle." Colonia ".$colonia." Delegacion ".$delegacion." #Ext ".$numExt." #Int ".$numInt;
								}
								else
								{
									echo "No se rellenaron correctamente los campos.";
								}
							}
							else
							{
								$direccion = $_REQUEST['direccion'];
							}
							$nombre = strtoupper($_REQUEST['nombre']);
							$apPaterno = strtoupper($_REQUEST['apPaterno']);
							$apMaterno = strtoupper($_REQUEST['apMaterno']);
							mysqli_query($con, "update clientes set nombre = '$nombre', apPaterno = '$apPaterno', apMaterno = '$apMaterno', telefono = '$_REQUEST[telefono]', direccion = '$direccion', correo = '$_REQUEST[correo]', contrasena = '$_REQUEST[contrasena]' where noCliente = $_REQUEST[ID]") or die(mysqli_error($con));
							echo "Modificacion ejecutada exitosamente.";
						}
						else
						{
							echo "No se rellenaron correctamente los campos.";
						}
					}
					else
					{
						echo "Las contrasenas no coinciden.";
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
		header("Location: /rentatucamion.esy.es wamp/index.html");
	}
?>