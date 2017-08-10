<?php
/*
 * This software is licensed under the MIT License.
 * Copyright (c) 2017 Marcel Beyer
*/

require_once '../config.php';


if(NIGHT_START == 0 && NIGHT_END == 0){
	//Nachtmodus ist deaktiviert
	echo "0";
	die();
}else{
	//Nachtmodus ist aktiv
	$now = intval(date("H", time()));
	if(NIGHT_START <= NIGHT_END){
		//Zeitvergleich ohne Tageswechsel
		if(NIGHT_START <= $now && $now <= NIGHT_END){
			// Es ist Nacht
			echo "1";
			die();	
		}else{
			//Es ist keine Nacht.
			echo "0";
			die();	
		}
	}else{
		//Zeitvergleich mit Tageswechsel	
		if($now >= NIGHT_START || $now <= NIGHT_END){
			// Es ist Nacht
			echo "1";
			die();	
		}else{
			//Es ist keine Nacht.
			echo "0";
			die();	
		}
	}
}
