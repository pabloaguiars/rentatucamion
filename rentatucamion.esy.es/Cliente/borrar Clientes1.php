<?php
	session_start();
	if(isset($_SESSION['IDCliente']))
	{
?>
<html>
	<head> 
		<title> Borrar </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexusuario.php");
		?>
		<form action = "borrar Clientes2.php" method = "post">
			<center> <h1> Eliminar cuenta </h1> </center>
			Si realmente quiere borrar su cuenta, ingrese su contrasena: 
			<input type = "password" name = "contrasena"> <br> <br>
			<input type = "submit" value = "LISTO">
		</form>
		<form action = "indexusuario.php" method = "post">
			<input type = "submit" value = "No, no quiero">
		</form>
		<hr>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /index.html");
	}
?>