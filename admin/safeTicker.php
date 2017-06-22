<?php
require_once 'sec.php';

@$html = $_POST['html'];
$result = file_put_contents("../data/tickerText.html",$html);

if($result === FALSE){
	echo "Error";
}else{
	header("Location: index.php");
}