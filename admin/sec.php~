<?php
session_start();
if(@$_SESSION['login'] != true && @$_POST['login'] != 'y'){
	echo "<!doctype html><html><head><title>Login</title></head><body>";
	echo "<h1>Login</h1>";
	echo "<form method=\"post\">";
	echo '<input type="hidden" name="login" value="y">';
	echo 'Nutzername: <input type="text" name="user"><br>';
	echo 'Passwort: <input type="password" name="pass"><br>';
	echo '<input type="submit" value="anmelden">';
	echo '</form></body></html>';
	die();
}elseif(@$_POST['login'] == 'y'){
	require_once '../config.php';
	if($_POST['user'] == ADMIN_LOGIN && $_POST['pass'] == ADMIN_PW){
		//Login OK	
		$_SESSION['login'] = true;
		//nichts weiter tun, Seite darf jetzt geladen werden
	}else{
		//Login nicht OK
		echo "<!doctype html><html><head><title>Login</title></head><body>";
		echo "<h1>Login</h1>";
		echo 'Die Zugangsdaten waren falsch.';
		echo '</body></html>';	
		die();
	}
}elseif(@$_SESSION['login'] == true){
	//Seite darf gezeigt werden...
}else{
	//Fehler? Zugriff blocken
	echo "Access denied.";
	die();
}