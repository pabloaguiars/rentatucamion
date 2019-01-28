<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head>
		<title> Alta camiones </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexadministrador.php");
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
		?>
		<form action = "alta camion2.php" method = "post">
			<center> <h1> Ingresar unidad al inventario </h1> </center>
			
			Marca: <input type = "text" name = "marca" required>
			Modelo: <input type = "text" name = "modelo" required> <br> <br>
			Anio: <input type = "text" name = "anio" required>
			VIN (Vehicle Identification Number): <input type = "text" name = "vin" size = "20" required> <br> <br>
			Capacidad del camion (Numero maximo de personas): <input type = "text" name = "capacidad" required>
			Unidad <select name = "disponibilidad">
			<option value = "1"> Disponible </option>
			<option value = "2"> No Disponible </option> <br> <br>
			</select> para su uso. <br> <br>
			Chofer a cargo de la unidad: <select name = "chofer">
			<?php
				$registros = mysqli_query($con, "select * from choferes") or die(mysqli_error($con));
				while ($reg = mysqli_fetch_array($registros))
				{
					echo "<option value=\"$reg[coChofer]\">$reg[nombre] $reg[apPaterno] Id: $reg[coChofer]</option>";
				}
			?>
			</select> <br> <br>
			<input type = "submit" value = "LISTO">
		</form>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /rentatucamion.esy.es wamp/index2.html");
	}
?>