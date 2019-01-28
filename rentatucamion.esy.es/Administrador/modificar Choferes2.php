<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head>
		<title> Modificar </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexadministrador.php");
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			$registro = mysqli_query($con, "select * from choferes where coChofer = $_REQUEST[ID]") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{ ?>
				<form action = "modificar Choferes3.php" method = "post">
					<center> <h1> Modificar chofer </h1> </center>
					ID chofer: <input type = "text" name = "ID" readonly = "readonly" size = "2" value = "<?php echo $reg['coChofer']; ?>"> <br> <br>
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
					<input type = "hidden" name = "ID" value = "<?php echo $_REQUEST['ID']; ?>">
					<br>
					<input type = "submit" value = "LISTO">
				</form>
			<?php }
			else
			{
				echo "No existe chofer con dicho ID.";
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