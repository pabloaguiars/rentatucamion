<!doctype html>
<?php
	session_start();
	if (isset($_SESSION['correo']))
	{
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="menu.css"/>
		<title> Bienvenido </title>
	</head>
	<body bgcolor = "Gray">
		<div id='cssmenu'>
		  <ul>
			 <li class='active'><a href='indexadministrador1.php'>Home</a></li>
			 </li><li class='has-sub '><a href='#'>Dar de alta...</a>
				<ul>
				   <li><a href='alta cliente1.php'>Un cliente</a> </li>
				   <li><a href='alta chofer1.php'>Un chofer</a></li>
				   <li><a href='alta camion1.php'>Una unidad</a> </li>
				   <li><a href='renta1.php'>Una renta</a> </li>
				</ul>
			 </li>
			 </li><li class='has-sub '><a href='#'>Listado de...</a>
				<ul>
				   <li><a href='listado Clientes.php'>Clientes</a> </li>
				   <li><a href='listado Choferes.php'>Choferes</a></li>
				   <li><a href='listado Camiones.php'>Unidades</a> </li>
				</ul>
			 </li>
			 <li class='has-sub '><a href='#'>Consultar...</a>
				<ul>
				   <li class='has-sub '><a href='#'>Cliente</a>
					  <ul>
						 <li><a href='consulta Cliente por codigo1.php'>Por ID</a></li>
						 <li><a href='consulta Cliente por nombre1.php'>Por Nombre</a></li>
					  </ul>
				   </li>
				   <li class='has-sub '><a href='#'>Chofer</a>
					  <ul>
						 <li><a href='consulta Chofer por codigo1.php'>Por ID</a></li>
						 <li><a href='consulta Chofer por nombre1.php'>Por Nombre</a></li>
					  </ul>
				   </li>
				    <li class='has-sub '><a href='#'>Unidad</a>
					  <ul>
						 <li><a href='consulta Camion por codigo1.php'>Por ID</a></li>
						 <li><a href='consulta Camion por vin1.php'>Por VIN</a></li>
					  </ul>
				   </li>
				</ul>
			 </li><li class='has-sub '><a href='#'>Modificar...</a>
				<ul>
				   <li><a href='modificar Clientes1.php'>Cliente</a> </li>
				   <li><a href='modificar Choferes1.php'>Chofer</a></li>
				   <li><a href='modificar Camiones1.php'>Unidad</a> </li>
				</ul>
			 </li>
			 </li><li class='has-sub '><a href='#'>Dar de baja...</a>
				<ul>
				   <li><a href='borrar Clientes1.php'>Un cliente</a> </li>
				   <li><a href='borrar Choferes1.php'>Un chofer</a></li>
				   <li><a href='borrar Camiones1.php'>Una unidad</a> </li>
				   <li><a href='borrar Renta1.php'>Una renta</a> </li>
				</ul>
			 </li>
			 <li><a href='cerrar sesion.php'>Cerrar sesion</a></li>
		  </ul>
		</div>
	</body>
	<?php
	}
	else
	{
		header("Location: /index2.html");
	}
	?>
</html>