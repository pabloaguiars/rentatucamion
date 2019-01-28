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
			$registro = mysqli_query($con, "select * from clientes where noCliente = '$_SESSION[IDCliente]'") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{ ?>
				<form action = "modificar Clientes3.php" method = "post">
					<center> <h1> Modificar tabla choferes </h1> </center>
					Por seguridad, ingrese su contrasena: 
					<input type = "password" name = "contrasenaactual" required> <br> <br>
					ID cliente: <input type = "text" name = "ID" readonly = "readonly" size = "2" value = "<?php echo $reg['noCliente']; ?>" required> <br> <br>
					Nombre: <input type = "text" name = "nombre" value = "<?php echo $reg['nombre']; ?>" required>
					Apellido Paterno: <input type = "text" name = "apPaterno" value = "<?php echo $reg['apPaterno']; ?>" required>
					Apellido Materno: <input type = "text" name = "apMaterno" value = "<?php echo $reg['apMaterno']; ?>" required> <br> <br>
					Numero de telefono: <input type = "text" name = "telefono" value = "<?php echo $reg['telefono']; ?>" required> <br> <br>
					Direccion: 
					<input type = "text" name = "direccion" readonly = "readonly" size = "85" value = "<?php echo $reg['direccion']; ?>"/> <br> <br>
					<input type = "checkbox" name = "check1" value = "1"> Cambiar direccion <br>
					Delegacion:  <input type = "text" name = "delegacion" size = "25">
					Colonia:  <input type = "text" name = "colonia" size = "25"> <br> <br>
					Calle:  <input type = "text" name = "calle" size = "25">
					# exterior <input type = "text" name = "numExt"> # interior <input type = "text" name = "numInt"> <br> <br>
					Correo: <input type = "text" name = "correo" placeholder="Email" size = "60" value = "<?php echo $reg['correo']; ?>"> <br> <br>
					Nueva contrasena... aqui: <input type = "text" name = "contrasena1"> Repita contrasena: <input type = "text" name = "contrasena2">
					<br>
					<input type = "submit" value = "Ejecutar modificacion">
				</form>
			<?php }
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