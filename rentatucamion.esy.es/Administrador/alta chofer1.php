<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head>
		<title> Alta choferes </title>
	</head>
	<body>}
	<?php
		error_reporting(0);
		include("indexadministrador.php");
	?>
		<form action = "alta chofer2.php" method = "post">
			<center> <h1> Dar de alta un chofer </h1> </center>
			
			Nombre: <input type = "text" name = "nombre" size = "25" required>
			Apellido Parterno: <input type = "text" name = "apPaterno" size = "25" required>
			Apellido Materno: <input type = "text" name = "apMaterno" size = "25" required> <br> <br>
			Numero de telefono:  <input type = "text" name = "telefono" size = "10" required> <br> <br>
			Direcion: <br> <br>
			Delegacion:  <input type = "text" name = "delegacion" size = "25" required>
			Colonia:  <input type = "text" name = "colonia" size = "25" required> <br> <br>
			Calle:  <input type = "text" name = "calle" size = "25" required>
			# exterior <input type = "text" name = "numExt" required> # interior <input type = "text" name = "numInt"> <br> <br>
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