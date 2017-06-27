<?php
require_once './config.php';

$file = $_GET['file'];
@$width = $_GET['width'];
if($width == ''){
	$width = '90%';
}

$html = file_get_contents('./files/'.$file);

if(INSERT_HTML_CONFIG != ''){
	require_once './adaptions/'.INSERT_HTML_CONFIG.'.php';
	$css = $_ADAPTION_INSERT_CSS;
	$css = str_replace('##WIDTH##', $width, $css);
	$css = '<style type="text/css">'.$css.'</style>';
	$html = str_replace('</head>',$css.'</head>', $html);
	
	foreach($_ADAPTION_REMOVE_HTML as $remove){
		$html = str_replace($remove, '', $html);
	}
}

echo $html;