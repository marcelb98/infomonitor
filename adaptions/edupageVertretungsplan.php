<?php 
/*
 * Konfiguration für eingebundene Vertretungspläne aus Edupage in den Infomonitor
 * ##WIDTH## ist ein Platzhalter für die Breite.
*/

$_ADAPTION_INSERT_CSS = '.print-a4-portrait {width: ##WIDTH## !important;}
 .dt-container table {width: 100% !important;}';
$_ADAPTION_REMOVE_HTML = array(
	'<colgroup><col style="width: 133px;"><col style="width: 133px;"><col style="width: 133px;"><col style="width: 133px;"><col style="width: 132px;"><col style="width: 132px;"></colgroup>',
);