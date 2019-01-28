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
		<form action = "borrar Choferes2.php" method = "post">
			<center> <h1> Eliminar un chofer</h1> </center>
			Ingrese ID del chofer: 
			<input type = "text" name = "ID" required> <br> <br>
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