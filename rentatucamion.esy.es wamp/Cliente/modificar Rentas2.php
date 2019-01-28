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
			$registro = mysqli_query($con, "select * from rentas where noRenta = $_REQUEST[renta]") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{ ?>
				<form action = "modificar Rentas3.php" method = "post">
					<center> <h1> Modificar </h1> </center>
					Por seguridad, ingrese su contrasena: 
					<input type = "password" name = "contrasena"> <br> <br>
					Renta #: <input type = "text" name = "renta" readonly = "readonly" size = "2" value = "<?php echo $reg['noRenta']; ?>">
					ID cliente: <input type = "text" name = "ID" readonly = "readonly" size = "2" value = "<?php echo $reg['noCliente']; ?>"> <br> <br>
					Renta programada para la fecha: <input type = "text" name = "fecha" readonly = "readonly" value = "<?php echo $reg['anio']." / ".$reg['mes']." / ".$reg['dia']; ?>"> <br>
					<input type = "checkbox" name = "check2" value = "1"> Cambiar fecha y/o hora <br> <br>
					Dia: 
					<select name = "dia">
						<?php
							$contador = 1;
							while($contador <= 31)
							{
								echo "<option value=\"$contador\"> $contador </option>";
								$contador = $contador + 1;
							}
						?>
					</select>
					Mes: 
					<select name = "mes">
						<?php
							$contador = 1;
							while($contador <= 12)
							{
								echo "<option value=\"$contador\"> $contador </option>";
								$contador = $contador + 1;
							}
						?>
					</select>
					Anio: 
					<select name = "anio">
						<?php
							$hoy = getdate();
							$contador = $hoy['year'];
							while($contador <= ($hoy['year'] + 1))
							{
								echo "<option value=\"$contador\"> $contador </option>";
								$contador = $contador + 1;
							}
						?>
					</select>
					Hora: 
					<select name = "hora">
						<?php
							$contador = 0;
							while($contador <= 23)
							{
								echo "<option value=\"$contador\"> $contador </option>";
								$contador = $contador + 1;
							}
						?>
					</select> <br> <br>
					Direccion: 
					<input type = "text" name = "direccion" readonly = "readonly" size = "85" value = "<?php echo $reg['direccion']; ?>"/> <br> <br>
					<input type = "checkbox" name = "check1" value = "1"> Cambiar direccion <br>
					Delegacion:  <input type = "text" name = "delegacion" size = "25">
					Colonia:  <input type = "text" name = "colonia" size = "25"> <br> <br>
					Calle:  <input type = "text" name = "calle" size = "25">
					# exterior <input type = "text" name = "numExt"> <br> <br>
					<input type = "hidden" name = "noRenta" value "<?php echo $_REQUEST['renta']; ?>">
					<input type = "hidden" name = "diaSM" value "<?php echo $reg['dia']; ?>">
					<input type = "hidden" name = "mesSM" value "<?php echo $reg['mes']; ?>">
					<input type = "hidden" name = "anioSM" value "<?php echo $reg['anio']; ?>">
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