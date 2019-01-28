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
			<center> <h1> Dar de alta un cliente </h1> </center>
			<?php 
			if(is_string($_REQUEST['nombre']) & is_string($_REQUEST['apPaterno']) & is_string($_REQUEST['apMaterno']) & is_numeric($_REQUEST['telefono']) & is_string($_REQUEST['delegacion']) & is_string($_REQUEST['colonia']) & is_string($_REQUEST['calle']) & is_numeric($_REQUEST['numExt']) & is_string($_REQUEST['contrasena']) & substr_count($_REQUEST['correo'], '@') == 1)
			{
				$registros = mysqli_query($con, "select * from clientes") or die(mysqli_error($con));
				if(empty($registros))
				{
					echo "Datos no recibidos de la Base.";
				}
				else 
				{
					while($reg = mysqli_fetch_array($registros))
					{
						$correo = $_REQUEST['correo'];
						if(in_array($correo,$reg))
						{
							echo "El correo dado ya existe en la base.";
							echo "<br>";
							echo "<hr>";
							echo "Pagina principal";
							echo "<a href = 'http://localhost/rentatucamion.esy.es%20wamp/'> Clic aqui </a>";
							exit(0);
						}
					}
				}
				$nombre = strtoupper($_REQUEST['nombre']);
				$apPaterno = strtoupper($_REQUEST['apPaterno']);
				$apMaterno = strtoupper($_REQUEST['apMaterno']);
				$delegacion = strtoupper($_REQUEST['delegacion']);
				$colonia = strtoupper($_REQUEST['colonia']);
				$calle = strtoupper($_REQUEST['calle']);
				$numExt = $_REQUEST['numExt'];
				$numInt = strtoupper($_REQUEST['numInt']);
				$direccion = "Calle ".$calle." Colonia ".$colonia." Delegacion ".$delegacion." #Ext ".$numExt." #Int ".$numInt;
				
				mysqli_query($con,"insert into clientes(nombre, apPaterno, apMaterno, telefono, direccion, correo, contrasena) values ('$nombre','$apPaterno','$apMaterno','$_REQUEST[telefono]','$direccion','$_REQUEST[correo]','$_REQUEST[contrasena]')") or die(mysqli_error($con));
				echo "Cliente dado de alta en el sistema.";
				echo "<br>";
				echo "<br>";
				echo "Por favor, conserve la informacion siguiente: ";
				echo "<br>";
				echo "<br>";
				$registro = mysqli_query($con, "select * from clientes where correo = '$_REQUEST[correo]'") or die(mysqli_error($con));
				if($reg = mysqli_fetch_array($registro))
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
					echo "Contrasena: ".$reg['contrasena'];
				}
				
			}
			else
			{
				echo "No se rellenaron correctamente los campos.";
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