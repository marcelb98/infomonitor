<?php
require_once 'sec.php';

@$n = $_GET['n'];
$name = base64_decode($n);
@$r = $_GET['r'];

if($r != 'y'){
	echo '<html><head></head><body>Die Datei <tt>'.$name.'</tt> wirklich l&ouml;schen?<br>';
	echo '<a href="delFile.php?r=y&n='.$n.'">JA</a> <a href="index.php">NEIN</a><br>';
	echo '</body></html>';
}else{
	//Prüfen, ob gerade aktiviert
	@$links = file_get_contents("../data/links.json");
	$links = json_decode($links);
	if( @in_array($name, $links) ){
		$i = array_search($name, $links);
		$links = array_splice($links, $i, 1);
	}
	$links = json_encode($links);
	file_put_contents("../data/links.json", $links);
	@$rechts = file_get_contents("../data/rechts.json");
	$rechts = json_decode($rechts);
	if( @in_array($name, $rechts) ){
		$i = array_search($name, $rechts);
		$rechts = array_splice($rechts, $i, 1);
	}
	$rechts = json_encode($rechts);
	file_put_contents("../data/rechts.json", $rechts);
	
	$result = unlink("../files/".$name);
	if($result){
		header("Location: index.php");
	}else{
		echo "Datei konnte nicht gel&ouml;scht werden.";
	}
}