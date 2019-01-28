<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head> 
		<title> Borrar </title>
	</head>
	<body>
	<?php
		error_reporting(0);
		include("indexadministrador.php");
	?>
		<form action = "borrar Usuario2.php" method = "post">
			<center> <h1> Eliminar un cliente </h1> </center>
			Ingrese su ID del cliente: 
			<input type = "text" name = "ID" required> <br> <br>
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