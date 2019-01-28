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
		<form action = "borrar Camiones2.php" method = "post">
			<center> <h1> Eliminar unidad </h1> </center>
			Ingrese ID de la unidad: 
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