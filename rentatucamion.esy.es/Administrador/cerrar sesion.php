<?php
	session_start();
	if(isset($_SESSION['correo']))
	{
		session_unset();
		session_destroy();
		header("Location: /index2.html");
	}
	else
	{
		header("Location: /rentatucamion.esy.es wamp/index.html");
	}
?>