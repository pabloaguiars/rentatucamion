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
		<center> <h1> Consulta cliente por ID </h1> </center>
		<form action = "consulta Cliente por codigo2.php" method = "post">
			Ingrese el ID del chofer: <input type = "text" name = "codigo" required> <br> <br>
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