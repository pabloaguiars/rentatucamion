<?php
	session_start();
	if(isset($_SESSION['IDCliente']))
	{
		session_unset();
		session_destroy();
		header("Location: /rentatucamion.esy.es wamp/index.html");
	}
	else
	{
		header("Location: /rentatucamion.esy.es wamp/index.html");
	}
?>