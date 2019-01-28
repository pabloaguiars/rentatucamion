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
			$con = mysqli_connect("host","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
				<center> <h1> Modificar renta</h1> </center>
			<?php
			$registro = mysqli_query($con, "select * from clientes where noCliente = $_SESSION['IDCliente']") or die(mysqli_error($con));
			if($reg = mysqli_fetch_array($registro))
			{
				if($reg['contrasena'] == $_REQUEST['contrasena'])
				{
					if($_REQUEST['check1'] == 1)
					{ 
						if(is_string($_REQUEST['delegacion']) & is_string($_REQUEST['colonia']) & is_string($_REQUEST['calle']) & is_numeric($_REQUEST['numExt']))
						{				
							$delegacion = strtoupper($_REQUEST['delegacion']);
							$colonia = strtoupper($_REQUEST['colonia']);
							$calle = strtoupper($_REQUEST['calle']);
							$numExt = $_REQUEST['numExt'];
							$numInt = strtoupper($_REQUEST['numInt']);;
							$direccion = "Calle ".$calle." Colonia ".$colonia." Delegacion ".$delegacion." #Ext ".$numExt." #Int ".$numInt;
							if($_REQUEST['check2'] == 1)
							{
								$hoy = getdate();
								if($hoy['year'] == $_REQUEST['anio'])
								{
									if($hoy['mon'] == $_REQUEST['mes'])
									{
										if($_REQUEST['dia'] > $hoy['mday'])
										{
											$registros = mysqli_query($con, "select * from rentas") or die(mysqli_error($con));
											while($reg = mysqli_fetch_array($registros))
											{
												if($_REQUEST['mes'] == $reg['mes'] & $_REQUEST['dia'] == $reg['dia'])
												{
													echo "Lo sentimos, con la fecha seleccionada no podemos asignarle una unidad que cubra sus necesidades.";
													echo "<br>";
													echo "<hr>";
													exit(0);
												}
											}
											$dia = $_REQUEST['dia'];
											$mes = $_REQUEST['mes'];
											$anio = $_REQUEST['anio'];
										}
										else
										{
											echo "Si quiere rentar un camion, debe de hacerlo con un dia de anticipacion.";
										}
									}
									elseif($_REQUEST['mes'] > $hoy['mon'])
									{
										$registros = mysqli_query($con, "select * from rentas") or die(mysqli_error($con));
										while($reg = mysqli_fetch_array($registros))
										{
											if($_REQUEST['mes'] == $reg['mes'] & $_REQUEST['dia'] == $reg['dia'])
											{
												echo "Lo sentimos, con la fecha seleccionada no podemos asignarle una unidad que cubra sus necesidades.";
												echo "<br>";
												echo "<hr>";
												exit(0);
											}
										}
										$dia = $_REQUEST['dia'];
										$mes = $_REQUEST['mes'];
										$anio = $_REQUEST['anio'];
									}
								}
								else
								{
									$registros = mysqli_query($con, "select * from rentas") or die(mysqli_error($con));
									while($reg = mysqli_fetch_array($registros))
									{
										if($_REQUEST['mes'] == $reg['mes'] & $_REQUEST['dia'] == $reg['dia'])
										{
											echo "Lo sentimos, con la fecha seleccionada no podemos asignarle una unidad que cubra sus necesidades.";
											echo "<br>";
											echo "<hr>";
											exit(0);
										}
									}
									$dia = $_REQUEST['dia'];
									$mes = $_REQUEST['mes'];
									$anio = $_REQUEST['anio'];
								}
							}
							else
							{
								$dia = $_REQUEST['diaSM'];
								$mes = $_REQUEST['mesSM'];
								$anio = $_REQUEST['anioSM'];
							}
						}
						else
						{
							echo "No se rellenaron correctamente los campos.";
						}
					}
					else
					{
						$direccion = $_REQUEST['direccion'];
					}
					mysqli_query($con, "update rentas set direccion = '$direccion', dia = '$dia', mes = '$mes', anio = 'anio' , hora = '$_REQUEST[hora]' where noRenta = $_REQUEST[noRenta]") or die(mysqli_error($con));
					echo "Modificacion ejecutada exitosamente.";
				}
				else
				{
					echo "La contrasena no es correcta.";
				}
			}
			else
			{
				echo "No existe cliente con dicho ID.";
			}
			mysqli_close($con);
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