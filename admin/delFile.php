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
	$result = unlink("../files/".$name);
	if($result){
		header("Location: index.php");
	}else{
		echo "Datei konnte nicht gel&ouml;scht werden.";
	}
}