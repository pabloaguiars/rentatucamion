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
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
		?>
		<form action = "borrar Renta2.php" method = "post">
			<center> <h1> Eliminar una renta </h1> </center>
			Ingrese el No. de Renta: 
			<input type = "text" name = "ID" required> <br> <br>
			<?php /* <select name = "ID">
			<?php
				$registros = mysqli_query
				while($reg = mysqli_fecth_array())
			?>
			</select> <br> <br> */ ?>
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