<?php
require_once 'config.php';
?>
<!doctype html>
<html>
<head>
	<title><?php echo TITLE; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="index.js"></script>
</head>
<?php
echo "<body onload=\"init(".DATEINTERVAL.",".TICKERINTERVAL.",".SLIDETIME.",".RELOADCONTENT.")\">";
?>
	<div id="top">
		<div class="left">
			<?php echo TITLE; ?>		
		</div>
		<div class="right" id="datum">
			Datum
		</div>
	
	</div>
	<div id="left">
		<?php
		$htmlLinks = "";
		@$links = file_get_contents("./data/links.json");
		$links = json_decode($links);
		$i = 1;
		$handle = opendir("./files");
			while( ($file = readdir($handle)) !== false ){
				$mime = mime_content_type("./files/".$file);
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
		echo $htmlLinks;
		$md5Links = md5($htmlLinks);
		?>
	</div>
	<div id="right">
		<?php
		$htmlRechts = "";
		@$rechts = file_get_contents("./data/rechts.json");
		$rechts = json_decode($rechts);
		$i = 1;
		$handle = opendir("./files");
			while( ($file = readdir($handle)) !== false ){
				$mime = mime_content_type("./files/".$file);
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
		echo $htmlRechts;
		$md5Rechts = md5($htmlRechts);
		?>
	</div>
	<div id="bottom">
		<?php
		echo '<marquee id="ticker" scrollamount="'.TICKERSPEED.'" scrolldelay=1000>Lade Inhalt...</marquee>';
		?>
	</div>
	<?php
	echo '<img src="pixel.png" width="1px" alt="" border="0" onload="setmd5(\'links\',\''.$md5Links.'\')">';
	echo '<img src="pixel.png" width="1px" alt="" border="0" onload="setmd5(\'rechts\',\''.$md5Rechts.'\')">';
	?>
</body>
</html>