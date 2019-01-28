<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
?>
<html>
	<head>
		<title> Respuesta </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexadministrador.php");
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
			<center> <h1> Ingresar unidad al inventario </h1> </center>
			<?php
			if(is_string($_REQUEST['marca']) & is_numeric($_REQUEST['capacidad']) & is_string($_REQUEST['modelo']) & is_numeric($_REQUEST['anio']) & is_string($_REQUEST['vin']))
			{
				$registros = mysqli_query($con, "select * from camiones") or die(mysqli_error($con));
				if(empty($registros))
				{
					echo "Datos no recibidos de la Base.";
					echo "<br>";
					echo "<hr>";
					echo "Pagina principal";
					echo "<a href = 'http://localhost/rentatucamion.esy.es%20wamp/'> Clic aqui </a>";
					exit(0);
				}
				else
				{
					while($reg = mysqli_fetch_array($registros))
					{
						$vin = strtoupper($_REQUEST['vin']);
						if(in_array($vin,$reg))
						{
							echo "El VIN dado ya existe en la base.";
							echo "<br>";
							echo "<hr>";
							echo "Pagina principal";
							echo "<a href = 'http://localhost/rentatucamion.esy.es%20wamp/'> Clic aqui </a>";
							exit(0);
						}
					}
				}
				$marca = strtoupper($_REQUEST['marca']);
				$modelo = strtoupper($_REQUEST['modelo']);
				$vin = strtoupper($_REQUEST['vin']);
				$chofer = $_REQUEST['chofer'];
				mysqli_query($con,"insert into camiones(capacidad, disponible, marca, modelo, anio, vin, chofer) values ('$_REQUEST[capacidad]','$_REQUEST[disponibilidad]','$marca','$modelo','$_REQUEST[anio]','$vin',$chofer)") or die(mysqli_error($con));
				echo "Camion dado de alta en el sistema.";
			}
			else
			{
				echo "No se rellenaron todos los campos.";
			}
			mysqli_close($con);
		?>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /index2.html");
	}
?>