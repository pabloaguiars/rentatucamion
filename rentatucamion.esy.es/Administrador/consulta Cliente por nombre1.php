
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
		<center> <h1> Consulta cliente por nombre </h1> </center>
		<form action = "consulta Chofer por nombre2.php" method = "post">
			Ingrese el nombre del cliente: <input type = "text" name = "nombre" required> <br> <br>
			<input type = "submit" value = "LISTO">
		</form>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /index2.html");
	}
?>