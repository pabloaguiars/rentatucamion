<?php
	session_start();
	if(isset($_SESSION['IDCliente']))
	{
?>
<html>
	<head> 
		<title> Modificar </title>
	</head>
	<body>
		<?php
			error_reporting(0);
			include("indexusuario.php");
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			$registros = mysqli_query($con, "select * from rentas") or die(mysqli_error($con));
			if(empty($registros))
			{
				echo "Usted no tiene alguna renta en el sistema o es posible que su renta(s) haya sido dado de baja.";	
			}
			else
			{
				?>
					<form action = "modificar Rentas2.php" method = "post">
						<center> <h1> Modificar una renta </h1> </center>
						Seleccione la renta a modificar: <select name = "renta">
						<?php
							while($reg = mysqli_fetch_array($registros))
							{
								if($reg['noCliente'] == $_SESSION['IDCliente'])
								{
									echo "<option value=\"$reg[noRenta]\"> Renta # $reg[noRenta] para la fecha: $reg[anio] / $reg[mes] / $reg[dia]</option>";
								}
							}
						?>
						</select> <br> <br>
						<input type = "submit" value = "LISTO">
					</form>
		
				<?php 
			} 
			echo "<hr>";
			?>
		
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /rentatucamion.esy.es wamp/index.html");
	}
?>