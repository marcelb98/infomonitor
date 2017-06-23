<?php
require_once '../config.php';
require_once 'sec.php';

//Vermerken, welche Dateien gezeigt werden
$links = "";
$rechts = "";

//Eingabe
$linksInput = $_POST['links'];
$rechtsInput = $_POST['rechts'];

//JSON erzeugen
$links = json_encode($linksInput);
$rechts = json_encode($rechtsInput);

//Speichern
$result1 = file_put_contents("../data/links.json", $links);
$result2 = file_put_contents("../data/rechts.json", $rechts);

if($result1 !== false && $result2 !== false){
	header("Location: index.php");
}else{
	echo "Einstellungen konnten nicht gespeichert werden.";
}