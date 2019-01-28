<!doctype html>
<?php
	session_start();
	if(isset($_SESSION['IDCliente']))
	{
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="menu.css"/>
		<title> Bienvenido </title>
	</head>
	<body bgcolor = "Gray">
	<?php
		error_reporting(0);
		$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
		$registro = mysqli_query($con,"select * from clientes where noCliente = '$_SESSION[IDCliente]'") or die(mysqli_error($con));
		if($reg = mysqli_fetch_array($registro))
		{
		echo "<h3>Bienvenido, ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno']."; Su ID de usuario es '".$reg['noCliente']."' </h3>";
		echo "<br>";
	?>
		<div id='cssmenu'>
		  <ul>
			 <li class='active'><a href='indexusuario1.php'>Home</a></li>
			  <li><a href='renta1.php'>Rentar</a>
			 <li class='has-sub '><a href='#'>Modificar...</a>
				<ul>
				   <li class=><a href='modificar Rentas1.php'>Una renta</a></li>
				   <li class=><a href='modificar Clientes2.php'>Mi cuenta</a></li>
				</ul>
			 </li>
			 <li class='has-sub '><a href='#'>Eliminar...</a>
				<ul>
				   <li class=><a href='borrar Renta1.php'>Una renta</a></li>
				   <li class=><a href='borrar Clientes1.php'>Mi cuenta</a></li>
				</ul>
			 </li>
			 <li><a href='cerrar sesion.php'>Cerrar sesion</a></li>
			 <li><a href='indexusuario1.php'>Contacto</a></li>
		  </ul>
		</div>
	<?php
		}
		include("slider.html");
		echo "<h1>Contactanos: Tel 664-RENTA-YA (664-736-82-92) Correo rentatucamion@gmail.com </h1>";
		echo "<hr>";
	?>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /index.html");
	}
	?>