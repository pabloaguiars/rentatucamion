<html>
	<head>
		<title> Nuevo </title>
	</head>
	<body bgcolor = "Gray" link="sky blue" vlink="sky blue" alink="#fff">
		<center>
		<?php
			error_reporting(0);
		?>
			<form action = "alta cliente2.php" method = "post">
				<center> <h1> Registro usuario </h1> </center>
				
				Nombre: <input type = "text" name = "nombre" size = "25" required>
				Apellido Parterno: <input type = "text" name = "apPaterno" size = "25" required>
				Apellido Materno: <input type = "text" name = "apMaterno" size = "25" required> <br> <br>
				Numero de telefono:  <input type = "text" name = "telefono" size = "10" required> <br> <br>
				Direcion: <br> <br>
				Delegacion:  <input type = "text" name = "delegacion" size = "25" required>
				Colonia:  <input type = "text" name = "colonia" size = "25" required> <br> <br>
				Calle:  <input type = "text" name = "calle" size = "25" required>
				# exterior <input type = "text" name = "numExt" required> # interior <input type = "text" name = "numInt"> <br> <br>
				Correo: <input type = "text" name = "correo"  size = "60" required> <br> <br>
				Contrasena: <input type = "password" name = "contrasena" required> <br> <br>
				<input type = "submit" value = "LISTO">
				</center>
				<hr>
				<p> <font face = "sans-serif" color = "#fff"> Regresar <a href = "/index.html"> Clic aqui </a> </p> </font>
			</form>
	</body>
</html>