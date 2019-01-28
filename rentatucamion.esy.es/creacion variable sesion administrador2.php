<?php
	session_start();
?>
<html>
	<head>
		<title> </title>
	</head>
	<body>
	<?php
		error_reporting(0);
		$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
		$registros = mysqli_query($con, "select * from administradores") or die(mysqli_error($con));
		while($reg = mysqli_fetch_array($registros))
		{
			if($reg['correo'] == $_REQUEST['correoinicio'])
			{
				if($reg['contrasena'] == $_REQUEST['contrasena'])
				{
					$_SESSION['correo']=$_REQUEST['correoinicio'];
					header("Location: /Administrador/indexadministrador1.php");
				}
				else
				{
					echo "Contrasena incorrecta.";
					echo "<br>";
					echo "<br>";
					?>
					<form action = "index2.html" method "post">
						<input type = "submit" value = "Otro Intento">
					</form>
					<br>
					<hr>
					Pagina principal
					<a href = "/index.html"> 
						Clic aqui
					</a>
					<?php
					exit(0);
				}
			}
		}
		echo "No existe administrador con dicho correo en nuestra base de datos.";
		echo "<br>";
		echo "<br>";
		?>
		<form action = "index2.html" method "post">
			<input type = "submit" value = "Otro Intento">
		</form>
		<br>
		<hr>
		Pagina principal
		<a href = "/index.html"> 
			Clic aqui
		</a>
		<?php
		exit(0);
	?>
	
	<br>
		<hr>
		Pagina principal
		<a href = "/index.html"> 
			Clic aqui
		</a>
	</body>
</html> 