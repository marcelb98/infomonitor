<?php
/*
 * This software is licensed under the MIT License.
 * Copyright (c) 2017 Marcel Beyer
*/

$htmlLinks = "";
@$links = file_get_contents("../data/links.json");
$links = json_decode($links);
$i = 1;
$handle = opendir("../files");
	while( ($file = readdir($handle)) !== false ){
		$mime = mime_content_type("../files/".$file);
		if( @in_array($file, $links) ){ //soll gezeigt werden?
			$htmlLinks .= '<div class="left" id="l'.$i.'">';
			if(	0 === strpos($mime, 'image') ) {
					//Es wird ein Bild angezeigt
					$htmlLinks .= '<img src="./files/'.$file.'" border="0" alt="'.$file.'">';
			}elseif($mime == 'text/html' || $mime == 'application/xhtml+xml' ){
					//HTML-Datei einbinden
					$htmlLinks .= '<iframe border="0" frameborder="0" scrolling="yes" id="frameL'.$i.'" onload="scrollFrame(\'frameL'.$i.'\')" src="html.php?file='.$file.'">Keine iFrame-Unterst&uuml;tzung...</iframe>';
			}else{
					//anderer Dateityp
					$htmlLinks .= "Unbekannter Dateityp von $file: $mime";
			}
			$htmlLinks .= '</div>';
			$i++;
		}
	}
$md5Links = md5($htmlLinks);

$htmlRechts = "";
@$rechts = file_get_contents("../data/rechts.json");
$rechts = json_decode($rechts);
$i = 1;
$handle = opendir("../files");
	while( ($file = readdir($handle)) !== false ){
		$mime = mime_content_type("../files/".$file);
		if( @in_array($file, $rechts) ){ //soll gezeigt werden?
			$htmlRechts .= '<div class="right" id="r'.$i.'">';
			if(	0 === strpos($mime, 'image') ) {
					//Es wird ein Bild angezeigt
					$htmlRechts .= '<img src="./files/'.$file.'" border="0" alt="'.$file.'">';
			}elseif($mime == 'text/html' || $mime == 'application/xhtml+xml' ){
					//HTML-Datei einbinden
					$htmlRechts .= '<iframe border="0" frameborder="0" scrolling="yes" id="frameR'.$i.'" onload="scrollFrame(\'frameR'.$i.'\')" src="html.php?file='.$file.'">Keine iFrame-Unterst&uuml;tzung...</iframe>';
			}else{
					//anderer Dateityp
					$htmlRechts .= "Unbekannter Dateityp von $file: $mime";
			}
			$htmlRechts .= '</div>';
			$i++;
		}
	}
$md5Rechts = md5($htmlRechts);

if($md5Links != $_POST['links'] || $md5Rechts != $_POST['rechts']){
	echo "y";
}else{
	echo "n";
}