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
			$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
			?>
			<center> <h1> Rentar una unidad </h1> </center>
			<?php
			$registros = mysqli_query($con, "select * from camiones") or die(mysqli_error($con));
			$n = $_REQUEST['n'];
			if(is_string($_REQUEST['delegacion']) & is_string($_REQUEST['colonia']) & is_string($_REQUEST['calle']) & is_numeric($_REQUEST['numExt']))
			{
				while($reg = mysqli_fetch_array($registros))
				{	
					if($reg['capacidad'] >= $_REQUEST['cuantasPersonas'])
					{
						if($reg['capacidad'] <= $n)
						{
							if($reg['disponible'] == "1")
							{
								$camionAsignado = $reg['coCamion'];
								$n = $reg['capacidad'];
							}
						}
					}
				}
				if($camionAsignado == null)
				{
					echo "Lo sentimos, no contamos actualmente con una unidad que cubra sus necesidades.";
				}
				else
				{
					$hoy = getdate();
					if($hoy['year'] == $_REQUEST['anio'])
					{
						if($hoy['mon'] == $_REQUEST['mes'])
						{
							if($_REQUEST['dia'] >= $hoy['mday'])
							{
								$registros = mysqli_query($con, "select * from rentas") or die(mysqli_error($con));
								while($reg = mysqli_fetch_array($registros))
								{
									if($_REQUEST['mes'] == $reg['mes'] & $_REQUEST['dia'] == $reg['dia'] & $reg['coCamion'] == $camionAsignado)
									{
										echo "Lo sentimos, no contamos actualmente con una unidad que cubra sus necesidades.";
										echo "<br>";
										echo "<hr>";
										echo "Pagina principal";
										echo "<a href = '/rentatucamion.esy.es%20wamp/'> Clic aqui </a>";
										exit(0);
									}
								}
								$registro = mysqli_query($con, "select * from clientes where noCliente = $_REQUEST[noCliente]") or die("Error3".mysqli_error($con));
								if($reg = mysqli_fetch_array($registro))
								{
									$delegacion = strtoupper($_REQUEST['delegacion']);
									$colonia = strtoupper($_REQUEST['colonia']);
									$calle = strtoupper($_REQUEST['calle']);
									$numExt = $_REQUEST['numExt'];
									$direccion = "Municipio ".$_REQUEST['municipio']." Calle ".$calle." Colonia ".$colonia." Delegacion ".$delegacion." #Ext ".$numExt;
									mysqli_query($con,"insert into rentas(coCamion,noCliente,dia,mes,anio,hora,direccion) values($camionAsignado,$_REQUEST[noCliente],'$_REQUEST[dia]','$_REQUEST[mes]','$_REQUEST[anio]','$_REQUEST[hora]','$direccion')") or die("Error1".mysqli_error($con));
									echo "Renta ejecutada exitosamente.";
									echo "<br>";
									echo "<br>";
									echo "Por favor, conserve la informacion siguiente:";
									echo "<br>";
									echo "<br>";
									$registros = mysqli_query($con, "select ren.noRenta, ren.coCamion,ren.dia, ren.mes, ren.anio, ren.hora, ren.direccion, clien.noCliente, clien.nombre, clien.apPaterno, clien.apMaterno from rentas as ren inner join clientes as clien on clien.noCliente = ren.noCliente") or die(mysqli_error($con));
									while($reg = mysqli_fetch_array($registros))
									{
										if($reg['anio'] == $_REQUEST['anio'] & $reg['mes'] == $_REQUEST['mes'] & $reg['dia'] == $_REQUEST['dia'] & $reg['coCamion'] == $camionAsignado)
										{
											echo "No. de Renta: ".$reg['noRenta'];
											echo "<br>";
											echo "ID Cliente: ".$reg['noCliente'];
											echo "<br>";
											echo "Nombre: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];
											echo "<br>";
											echo "Datos de la renta: ";
											echo "<br>";
											echo "<br>";
											echo "Fecha: ".$reg['anio']." / ".$reg['mes']." / ".$reg['dia']."   Hora: ".$reg['hora']."hrs";
											echo "<br>";
											echo "Direccion: ".$reg['direccion'];
											echo "<br>";
											echo "Camion asignado: ".$reg['coCamion'];
										}
									}
								}
								else
								{
									echo "No existe cliente con dicho ID.";
								}
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
								if($_REQUEST['mes'] == $reg['mes'] & $_REQUEST['dia'] == $reg['dia'] & $reg['coCamion'] == $camionAsignado)
								{
									echo "Lo sentimos, no contamos actualmente con una unidad que cubra sus necesidades.";
									echo "<br>";
									echo "<hr>";
									echo "Pagina principal";
									echo "<a href = '/rentatucamion.esy.es%20wamp/'> Clic aqui </a>";
									exit(0);
								}
							}
							$registro = mysqli_query($con, "select * from clientes where noCliente = $_REQUEST[noCliente]") or die("Error3".mysqli_error($con));
							if($reg = mysqli_fetch_array($registro))
							{
								$delegacion = strtoupper($_REQUEST['delegacion']);
								$colonia = strtoupper($_REQUEST['colonia']);
								$calle = strtoupper($_REQUEST['calle']);
								$numExt = $_REQUEST['numExt'];
								$direccion = "Municipio ".$_REQUEST['municipio']." Calle ".$calle." Colonia ".$colonia." Delegacion ".$delegacion." #Ext ".$numExt;
								mysqli_query($con,"insert into rentas(coCamion,noCliente,dia,mes,anio,hora,direccion) values($camionAsignado,$_REQUEST[noCliente],'$_REQUEST[dia]','$_REQUEST[mes]','$_REQUEST[anio]','$_REQUEST[hora]','$direccion')") or die("Error1".mysqli_error($con));
								echo "Renta ejecutada exitosamente."; 
								echo "<br>";
								echo "<br>";
								echo "Por favor, conserve la informacion siguiente:";
								echo "<br>";
								echo "<br>";
								$registros = mysqli_query($con, "select ren.noRenta, ren.coCamion,ren.dia, ren.mes, ren.anio, ren.hora, ren.direccion, clien.noCliente, clien.nombre, clien.apPaterno, clien.apMaterno from rentas as ren inner join clientes as clien on clien.noCliente = ren.noCliente") or die(mysqli_error($con));
								while($reg = mysqli_fetch_array($registros))
									{
										if($reg['anio'] == $_REQUEST['anio'] & $reg['mes'] == $_REQUEST['mes'] & $reg['dia'] == $_REQUEST['dia'] & $reg['coCamion'] == $camionAsignado)
											{
												echo "No. de Renta: ".$reg['noRenta'];
												echo "<br>";
												echo "ID Cliente: ".$reg['noCliente'];
												echo "<br>";
												echo "Nombre: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];
												echo "<br>";
												echo "Datos de la renta: ";
												echo "<br>";
												echo "<br>";
												echo "Fecha: ".$reg['anio']." / ".$reg['mes']." / ".$reg['dia']."   Hora: ".$reg['hora']."hrs";
												echo "<br>";
												echo "Direccion: ".$reg['direccion'];
												echo "<br>";
												echo "Camion asignado: ".$reg['coCamion'];
											}
										}
							}
							else
							{
								echo "No existe cliente con dicho ID.";
							}
						}
					}
					else
					{
						$registros = mysqli_query($con, "select * from rentas") or die(mysqli_error($con));
							while($reg = mysqli_fetch_array($registros))
							{
								if($_REQUEST['mes'] == $reg['mes'] & $_REQUEST['dia'] == $reg['dia'] & $reg['coCamion'] == $camionAsignado)
								{
									echo "Lo sentimos, no contamos actualmente con una unidad que cubra sus necesidades.";
									echo "<br>";
									echo "<hr>";
									echo "Pagina principal";
									echo "<a href = '/rentatucamion.esy.es%20wamp/'> Clic aqui </a>";
									exit(0);
								}
							}
							$registro = mysqli_query($con, "select * from clientes where noCliente = $_REQUEST[noCliente]") or die("Error3".mysqli_error($con));
							if($reg = mysqli_fetch_array($registro))
							{
								$delegacion = strtoupper($_REQUEST['delegacion']);
								$colonia = strtoupper($_REQUEST['colonia']);
								$calle = strtoupper($_REQUEST['calle']);
								$numExt = $_REQUEST['numExt'];
								$direccion = "Municipio ".$_REQUEST['municipio']." Calle ".$calle." Colonia ".$colonia." Delegacion ".$delegacion." #Ext ".$numExt;
								mysqli_query($con,"insert into rentas(coCamion,noCliente,dia,mes,anio,hora,direccion) values($camionAsignado,$_REQUEST[noCliente],'$_REQUEST[dia]','$_REQUEST[mes]','$_REQUEST[anio]','$_REQUEST[hora]','$direccion')") or die("Error1".mysqli_error($con));
								echo "Renta ejecutada exitosamente.";
								echo "<br>";
								echo "<br>";
								echo "Por favor, conserve la informacion siguiente:";
								echo "<br>";
								echo "<br>";
								$registros = mysqli_query($con, "select ren.noRenta, ren.coCamion,ren.dia, ren.mes, ren.anio, ren.hora, ren.direccion, clien.noCliente, clien.nombre, clien.apPaterno, clien.apMaterno from rentas as ren inner join clientes as clien on clien.noCliente = ren.noCliente") or die(mysqli_error($con));
								while($reg = mysqli_fetch_array($registros))
								{
									if($reg['anio'] == $_REQUEST['anio'] & $reg['mes'] == $_REQUEST['mes'] & $reg['dia'] == $_REQUEST['dia'] & $reg['coCamion'] == $camionAsignado)
									{
										echo "No. de Renta: ".$reg['noRenta'];
										echo "<br>";
										echo "ID Cliente: ".$reg['noCliente'];
										echo "<br>";
										echo "Nombre: ".$reg['nombre']." ".$reg['apPaterno']." ".$reg['apMaterno'];
										echo "<br>";
										echo "Datos de la renta: ";
										echo "<br>";
										echo "<br>";
										echo "Fecha: ".$reg['anio']." / ".$reg['mes']." / ".$reg['dia']."   Hora: ".$reg['hora']."hrs";
										echo "<br>";
										echo "Direccion: ".$reg['direccion'];
										echo "<br>";
										echo "Camion asignado: ".$reg['coCamion'];
									}
								}
							}
							else
							{
								echo "No existe cliente con dicho ID.";
							}
						}
					}
			}
			else
			{
				echo "Los campos no se rellenaron correctamente.";
			}
			mysqli_close($con);
		?>
	</body>
</html>
<?php
	}
	else
	{
		header("Location: /rentatucamion.esy.es wamp/index2.html");
	}
?>