<?php
	/*
		classes initialized here.
	*/
	session_start();
	spl_autoload_register(function($class){
		require_once "Model/".$class. ".php";
	});

?>