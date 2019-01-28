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
			include("indexadministrador.php");
		?>
		<center> <h1> Consulta unidad por ID </h1> </center>
		<form action = "consulta Camion por codigo2.php" method = "post">
			Ingrese el ID de la unidad: <input type = "text" name = "codigo" required> <br> <br>
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