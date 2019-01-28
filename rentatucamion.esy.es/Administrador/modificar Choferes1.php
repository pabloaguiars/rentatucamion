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
	?>
		<form action = "modificar Choferes2.php" method = "post">
			<center> <h1> Modificar choferes </h1> </center>
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