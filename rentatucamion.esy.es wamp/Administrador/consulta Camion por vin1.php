<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head> 
		<title> Consulta </title> 
	</head>
	<body>
	<?php 
		error_reporting(0);
		nclude("indexadministrador.php");
	?>
		<center> <h1> Consulta unidad por VIN </h1> </center>
		<form action = "consulta Camion por vin2.php" method = "post">
			Ingrese el VIN de la unidad: <input type = "text" name = "vin" required> <br> <br>
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