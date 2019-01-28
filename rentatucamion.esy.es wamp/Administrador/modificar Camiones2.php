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
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			$registro = mysqli_query($con, "select * from camiones where coCamion = $_REQUEST[ID]") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{ ?>
				<form action = "modificar Camiones3.php" method = "post">
					<center> <h1> Modificar unidad </h1> </center>
					ID camion: <input type = "text" name = "ID" readonly = "readonly" size = "2" value = "<?php echo $reg['coCamion']; ?>">
					Marca: <input type = "text" name = "marca" value = "<?php echo $reg['marca']; ?>">
					Modelo: <input type = "text" name = "modelo" value = "<?php echo $reg['modelo']; ?>">
					Anio: <input type = "text" name = "anio" value = "<?php echo $reg['anio']; ?>"> <br> <br>
					VIN (Vehicle Identification Number): <input type = "text" name = "vin" size = "20" value = "<?php echo $reg['vin']; ?>"> <br> <br>
					Capacidad: <input type = "text" name = "capacidad" value = "<?php echo $reg['capacidad']; ?>"> <br> <br>
					Unidad: <?php 
						if($reg['disponible'] <> 1)
							echo "No Disponible";
						else
							echo "Disponible";
					?>  <br>
					Seleccione disponibilidad: <br>
					<input type = "radio" name = "radio1" value = "1"> Disponible <br>
					<input type = "radio" name = "radio1" value = "2"> No Disponible <br> <br>
					Chofer a cargo de la unidad: <select name = "chofer">
					<?php
						echo "<option value=\"$reg[chofer]\">Id: $reg[chofer]</option>";
						$registros = mysqli_query($con, "select * from choferes") or die(mysqli_error($con));
						while ($reg = mysqli_fetch_array($registros))
						{
							echo "<option value=\"$reg[coChofer]\">$reg[nombre] $reg[apPaterno] Id: $reg[coChofer]</option>";
						}
					?>
					</select> <br> <br>
					<input type = "hidden" name = "ID" value = "<?php echo $_REQUEST['ID']; ?>">
					<br>
					<input type = "submit" value = "LISTO">
				</form>
			<?php }
			else
			{
				echo "No existe unidad con dicho ID.";
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