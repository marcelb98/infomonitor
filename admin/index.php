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
</body>
</html>