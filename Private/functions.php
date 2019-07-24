<?php

function isLogged(){
	session_start();
	if(!isset($_SESSION["username"])){
	header("Location: login.php");
	exit(); 
	}
}

?>