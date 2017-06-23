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
echo "<body onload=\"init(".DATEINTERVAL.",".TICKERINTERVAL.",".SLIDETIME.")\">";
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
		@$links = file_get_contents("./data/links.json");
		$links = json_decode($links);
		$i = 1;
		$handle = opendir("./files");
			while( ($file = readdir($handle)) !== false ){
				$mime = mime_content_type("./files/".$file);
				if( @in_array($file, $links) ){ //soll gezeigt werden?
					echo '<div class="left" id="l'.$i.'">';
					if(	0 === strpos($mime, 'image') ) {
							//Es wird ein Bild angezeigt
							echo '<img src="./files/'.$file.'" border="0" alt="'.$file.'">';
					}elseif($mime == 'text/html' || $mime == 'application/xhtml+xml' ){
							//HTML-Datei einbinden
							echo '<iframe border="0" frameborder="0" scrolling="yes" id="frameL'.$i.'" onload="scrollFrame(\'frameL'.$i.'\')" src="./files/'.$file.'">Keine iFrame-Unterst&uuml;tzung...</iframe>';
					}else{
							//anderer Dateityp
							echo "Unbekannter Dateityp von $file: $mime";
					}
					echo '</div>';
					$i++;
				}
			}
		?>
	</div>
	<div id="right">
		<?php
		@$rechts = file_get_contents("./data/rechts.json");
		$rechts = json_decode($rechts);
		$i = 1;
		$handle = opendir("./files");
			while( ($file = readdir($handle)) !== false ){
				$mime = mime_content_type("./files/".$file);
				if( @in_array($file, $rechts) ){ //soll gezeigt werden?
					echo '<div class="right" id="r'.$i.'">';
					if(	0 === strpos($mime, 'image') ) {
							//Es wird ein Bild angezeigt
							echo '<img src="./files/'.$file.'" border="0" alt="'.$file.'">';
					}elseif($mime == 'text/html' || $mime == 'application/xhtml+xml' ){
							//HTML-Datei einbinden
							echo '<iframe border="0" frameborder="0" scrolling="yes" id="frameR'.$i.'" onload="scrollFrame(\'frameR'.$i.'\')" src="./files/'.$file.'">Keine iFrame-Unterst&uuml;tzung...</iframe>';
					}else{
							//anderer Dateityp
							echo "Unbekannter Dateityp von $file: $mime";
					}
					echo '</div>';
					$i++;
				}
			}
		?>
	</div>
	<div id="bottom">
		<?php
		echo '<marquee id="ticker" scrollamount="'.TICKERSPEED.'" scrolldelay=1000>Lade Inhalt...</marquee>';
		?>
	</div>
</body>
</html>