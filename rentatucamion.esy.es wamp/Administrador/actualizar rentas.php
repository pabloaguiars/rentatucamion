<?php
	error_reporting(0);
	$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
	$paraAyer = false;
	$paraHoy = false;
	$paraManana = false;
	$hoy = getdate();
	
	$registrosRentas = mysqli_query($con, "select ren.noRenta, ren.coCamion,ren.dia, ren.mes, ren.anio, ren.hora, ren.direccion, clien.noCliente, clien.nombre, clien.apPaterno, clien.apMaterno from rentas as ren inner join clientes as clien on clien.noCliente = ren.noCliente") or die(mysqli_error($con));
	if(empty($registrosRentas))
	{
		echo "<h1> No se encontraron ventas en la base. </h1>";
	}
	else
	{
		echo "<table border = 1>";
		echo '<tr> <td align = "center"> <h3> Rentas Eliminadas </h3> </td> <td align = "center"> <h3> Rentas para Hoy </h3> </td> <td align = "center"> <h3> Rentas para el Mes </h3> </td> </tr>';
		echo "<tr> <td>";
		while($regRentas = mysqli_fetch_array($registrosRentas))
		{
			if($regRentas['anio'] == $hoy['year'])
			{
				if($regRentas['mes'] == $hoy['mon'])
				{
					if($regRentas['dia'] < $hoy['mday'])
					{
						$paraAyer = True;
						echo "No. de Renta: ".$regRentas['noRenta'];
						echo "<br>";
						echo "ID Cliente: ".$regRentas['noCliente'];
						echo "<br>";
						echo "Nombre: ".$regRentas['nombre']." ".$regRentas['apPaterno']." ".$regRentas['apMaterno'];
						echo "<br>";
						echo "Datos de la renta: ";
						echo "<br>";
						echo "<br>";
						echo "Fecha: ".$regRentas['anio']." / ".$regRentas['mes']." / ".$regRentas['dia']."   Hora: ".$regRentas['hora']."hrs";
						echo "<br>";
						echo "Direccion: ".$regRentas['direccion'];
						echo "<br>";
						echo "Camion asignado: ".$regRentas['coCamion'];
						echo "<br>";
						echo "<hr>";
						mysqli_query($con, "delete from rentas where noRenta = $regRentas[noRenta]") or die("Error delete por dia. ".mysqli_error($con));
					}
				}
				elseif($regRentas['mes'] < $hoy['mon'])
				{
					$paraAyer = True;
					echo "No. de Renta: ".$regRentas['noRenta'];
					echo "<br>";
					echo "ID Cliente: ".$regRentas['noCliente'];
					echo "<br>";
					echo "Nombre: ".$regRentas['nombre']." ".$regRentas['apPaterno']." ".$regRentas['apMaterno'];
					echo "<br>";
					echo "Datos de la renta: ";
					echo "<br>";
					echo "<br>";
					echo "Fecha: ".$regRentas['anio']." / ".$regRentas['mes']." / ".$regRentas['dia']."   Hora: ".$regRentas['hora']."hrs";
					echo "<br>";
					echo "Direccion: ".$regRentas['direccion'];
					echo "<br>";
					echo "Camion asignado: ".$regRentas['coCamion'];
					echo "<br>";
					echo "<hr>";
					mysqli_query($con, "delete from rentas where noRenta = $regRentas[noRenta]") or die("Error delete por mes. ".mysqli_error($con));
				}
			}
			elseif($regRentas['anio'] < $hoy['year'])
			{
				$paraAyer = True;
				echo "No. de Renta: ".$regRentas['noRenta'];
				echo "<br>";
				echo "ID Cliente: ".$regRentas['noCliente'];
				echo "<br>";
				echo "Nombre: ".$regRentas['nombre']." ".$regRentas['apPaterno']." ".$regRentas['apMaterno'];
				echo "<br>";
				echo "Datos de la renta: ";
				echo "<br>";
				echo "<br>";
				echo "Fecha: ".$regRentas['anio']." / ".$regRentas['mes']." / ".$regRentas['dia']."   Hora: ".$regRentas['hora']."hrs";
				echo "<br>";
				echo "Direccion: ".$regRentas['direccion'];
				echo "<br>";
				echo "Camion asignado: ".$regRentas['coCamion'];
				echo "<br>";
				echo "<hr>";
				mysqli_query($con, "delete from rentas where noRenta = $regRentas[noRenta]") or die("Error delete por anio. ".mysqli_error($con));
			}
		}
		if($paraAyer == false)
		{
			echo "<h4> No se encontraron rentas de dias pasados </h4>";
		}
		echo "</td>";
		echo "<td>";
		$registrosRentas = mysqli_query($con, "select ren.noRenta, ren.coCamion,ren.dia, ren.mes, ren.anio, ren.hora, ren.direccion, clien.noCliente, clien.nombre, clien.apPaterno, clien.apMaterno from rentas as ren inner join clientes as clien on clien.noCliente = ren.noCliente") or die(mysqli_error($con));
		$hoy = getdate();
		while($regRentas = mysqli_fetch_array($registrosRentas))
		{
			if($regRentas['anio'] == $hoy['year'] && $regRentas['mes'] == $hoy['mon'] && $regRentas['dia'] == $hoy['mday'])
			{
				$paraHoy = True;
				echo "No. de Renta: ".$regRentas['noRenta'];
				echo "<br>";
				echo "ID Cliente: ".$regRentas['noCliente'];
				echo "<br>";
				echo "Nombre: ".$regRentas['nombre']." ".$regRentas['apPaterno']." ".$regRentas['apMaterno'];
				echo "<br>";
				echo "Datos de la renta: ";
				echo "<br>";
				echo "<br>";
				echo "Fecha: ".$regRentas['anio']." / ".$regRentas['mes']." / ".$regRentas['dia']."   Hora: ".$regRentas['hora']."hrs";
				echo "<br>";
				echo "Direccion: ".$regRentas['direccion'];
				echo "<br>";
				echo "Camion asignado: ".$regRentas['coCamion'];
				echo "<br>";
				echo "<hr>";
			}
		}
		if($paraHoy == false)
		{
			echo "<h4> No se encontraron rentas para hoy </h4>";
		}
		echo "</td>";
		echo "<td>";
		$registrosRentas = mysqli_query($con, "select ren.noRenta, ren.coCamion,ren.dia, ren.mes, ren.anio, ren.hora, ren.direccion, clien.noCliente, clien.nombre, clien.apPaterno, clien.apMaterno from rentas as ren inner join clientes as clien on clien.noCliente = ren.noCliente") or die(mysqli_error($con));
		$hoy = getdate();
		while($regRentas = mysqli_fetch_array($registrosRentas))
		{
			if($regRentas['anio'] == $hoy['year'])
			{
				if($regRentas['mes'] == $hoy['mon'])
				{
					if($regRentas['dia'] > $hoy['mday'])
					{
						$paraManana = True;
						echo "No. de Renta: ".$regRentas['noRenta'];
						echo "<br>";
						echo "ID Cliente: ".$regRentas['noCliente'];
						echo "<br>";
						echo "Nombre: ".$regRentas['nombre']." ".$regRentas['apPaterno']." ".$regRentas['apMaterno'];
						echo "<br>";
						echo "Datos de la renta: ";
						echo "<br>";
						echo "<br>";
						echo "Fecha: ".$regRentas['anio']." / ".$regRentas['mes']." / ".$regRentas['dia']."   Hora: ".$regRentas['hora']."hrs";
						echo "<br>";
						echo "Direccion: ".$regRentas['direccion'];
						echo "<br>";
						echo "Camion asignado: ".$regRentas['coCamion'];
						echo "<br>";
						echo "<hr>";
					}
				}
			}
		}
		if($paraManana == false)
		{
			echo "<h4> No se encontraron rentas para manana </h4>";
		}
		echo "</td>";
		echo "</table>";
	}
?>