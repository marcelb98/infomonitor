<?php
require_once 'sec.php';

//Testen, ob Datei schon existiert
if(is_file("../files/".$_FILES['file']['name']) && @$_POST['overwrite'] != 'y'){
	//existiert schon
	echo "Diese Datei existiert schon.";
	die();
}

//Datei kopieren
$result = move_uploaded_file($_FILES['file']['tmp_name'], '../files/'.$_FILES['file']['name']);

if($result){
	header("Location: index.php");
}else{
	echo "Datei konnte nicht gespeichert werden.";
}