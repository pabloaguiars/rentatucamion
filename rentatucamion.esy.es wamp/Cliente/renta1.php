<?php
	session_start();
	if(isset($_SESSION['IDCliente']))
	{
?>
<html>
	<head>
		<title> Alta Renta </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexusuario.php");
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			$mayor = 0;
		$registros = mysqli_query($con, "select * from camiones") or die(mysqli_error($con));
		If(empty($registros))
		{
			echo "Datos no recibidos dela Base.";
		}
		else
		{
			while($reg = mysqli_fetch_array($registros))
			{
				if ($reg['disponible'] <> '2')
				{ ?>
					<form action = "renta2.php" method = "post">
						<center> <h1> Rentar una unidad </h1> </center>
						Renta para la fecha:	
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
						Para 
						<select name = "cuantasPersonas">
							<?php
								$contador = 1;
								$registros2 = mysqli_query($con, "select * from camiones") or die(mysqli_error($con));
								while($regMayor = mysqli_fetch_array($registros2))
								{
									if($regMayor['capacidad'] >= $mayor)
									{
										$mayor = $regMayor['capacidad'];
									}
								}
								while($contador <= $mayor)
								{
									echo "<option value=\"$contador\"> $contador </option>";
									$contador = $contador + 1;
								}
							?>
						</select> personas <br> <br>
						Direcion: <br> <br>
						Municipio: <select name = "municipio">
							<option value = "TIJUANA">Tijuana </option>
							<option value = "TECATE">Tecate </option>
							<option value = "MEXICALI">Mexicali </option>
							<option value = "ROSARITO">Rosarito </option>
							<option value = "ENSENADA">Ensenada </option>
						</select> <br> <br>
						Delegacion:  <input type = "text" name = "delegacion" size = "25" required>
						Colonia:  <input type = "text" name = "colonia" size = "25" required> <br> <br>
						Calle:  <input type = "text" name = "calle" size = "25" required>
						# exterior <input type = "text" name = "numExt" required> <br> <br>
						<input type = "hidden" name = "n" value = "<?php echo $mayor; ?>">
						<input type = "submit" value = "Ejecutar Renta">
					</form>
				<?php  
				mysqli_close($con);
				echo "<hr>";
				exit(0);
				}
			}
			echo "Lo sentimos, no contamos con unidades disponibles";
			echo "<hr>";
		}
		mysqli_close($con); ?>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /rentatucamion.esy.es wamp/index.html");
	}
?>