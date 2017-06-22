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
echo "<body onload=\"init(".DATEINTERVAL.",".TICKERINTERVAL.")\">";
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
	
	</div>
	<div id="right">
	
	</div>
	<div id="bottom">
		<?php
		echo '<marquee id="ticker" scrollamount="'.TICKERSPEED.'" scrolldelay=1000>Lade Inhalt...</marquee>';
		?>
	</div>
</body>
</html>