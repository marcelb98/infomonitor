<?php
require_once '../config.php';
require_once 'sec.php';
?>
<!doctype html>
<html>
<head>
	<title>Infomonitor - Admin</title>
	<script type="text/javascript">
	function tickerVorschau(){
		var html = document.getElementById('ticker_input').value;
		document.getElementById('ticker_vorschau').innerHTML = html;	
	}
	function ticker_format(char1, char2) {
		document.getElementById('ticker_input').value = document.getElementById('ticker_input').value + char1 +' ' + char2;
	}
	</script>
</head>
<body>
	<a href="logout.php">Abmelden</a>
	<h1>Administration</h1>
	
	<fieldset>
		<legend>Infoticker (unterer Bildschirm)</legend>
		<form action="safeTicker.php" method="post">
		<input type="button" value="B" onclick="ticker_format('<b>','</b>')">	 <input type="button" value="I" onclick="ticker_format('<i>','</i>')"> <input type="button" value="U" onclick="ticker_format('<u>','</u>')"><br>
		Eingabe (HTML): 
		<?php $html = file_get_contents('../data/tickerText.html'); echo '<input type="text" name="html" onchange="tickerVorschau()" id="ticker_input" style="width:100%;" value="'.$html.'"><br>'; ?>
		Vorschau:<br>
		<div style="background-color: #eee;" id="ticker_vorschau"></div><br>
		<input type="submit" value="speichern">
		</form>
	</fieldset>
	<br>
	
	<fieldset>
		<legend>Bildschirmh&auml;lften</legend>
		<form action="bildschirmeSpeichern.php" method="post">
		Welche Inhalte sollen auf dem linken Bildschirm gezeigt werden?
		<table border="0">
		<tr>
			<th>Aktiv?</th><th>Inhalt</th>
		</tr>
		<?php
		@$links = file_get_contents("../data/links.json");
		$links = json_decode($links);
		$handle = opendir("../files");
			while( ($file = readdir($handle)) !== false ){
				if( in_array(mime_content_type("../files/".$file), $FILETYPES) ){ //Zugelassener Dateityp?
					echo "<tr>";
					if( @in_array($file, $links) ){
						echo "<td><input type=\"checkbox\" checked=\"checked\" name=\"links[]\" value=\"".$file."\"></td><td>$file</td>";
					}else{
						echo "<td><input type=\"checkbox\" name=\"links[]\" value=\"".$file."\"></td><td>$file</td>";
					}
					echo "</tr>";
					echo "</tr>";
				}
			}
		?>
		</table>
		
		<br>
		
		Welche Inhalte sollen auf dem rechten Bildschirm gezeigt werden?
		<table border="0">
		<tr>
			<th>Aktiv?</th><th>Inhalt</th>
		</tr>
		<?php
		@$rechts = file_get_contents("../data/rechts.json");
		$rechts = json_decode($rechts);
		$handle = opendir("../files");
			while( ($file = readdir($handle)) !== false ){
				if( in_array(mime_content_type("../files/".$file), $FILETYPES) ){ //Zugelassener Dateityp?
					echo "<tr>";
					if( @in_array($file, $rechts) ){
						echo "<td><input type=\"checkbox\" checked=\"checked\" name=\"rechts[]\" value=\"".$file."\"></td><td>$file</td>";
					}else{
						echo "<td><input type=\"checkbox\" name=\"rechts[]\" value=\"".$file."\"></td><td>$file</td>";
					}
					echo "</tr>";
					echo "</tr>";
				}
			}
		?>
		</table>
		
		<br>
		<input type="submit" value="speichern">
		</form>
	</fieldset>
	
	<br>
	
	<fieldset>
		<legend>Dateien</legend>
		<form action="uploadFile.php" method="post" enctype="multipart/form-data">
		Neue Datei hochladen: <input type="file" name="file"> <input type="submit" value="hochladen"><br>
		<input type="checkbox" name="overwrite" value="y">Datei &uuml;berschreiben, falls schon vorhanden<br>	
		</form>	
		<br>
		<b>Folgende Dateien sind im System hinterlegt:</b><br>
		<ul>
			<?php
			$handle = opendir("../files");
			while( ($file = readdir($handle)) !== false ){
				if($file != "." && $file != ".."){
					echo "<li>".$file. " (". mime_content_type("../files/".$file) . ") <a href=\"delFile.php?n=".base64_encode($file)."\" title=\"l&ouml;schen\">[L]</a></li>";	
				}		
			}
			?>
		</ul>
		
		
	</fieldset>
</body>
</html>