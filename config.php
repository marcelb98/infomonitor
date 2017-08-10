<?php
/*
 * This software is licensed under the MIT License.
 * Copyright (c) 2017 Marcel Beyer
*/

// ** Admin-Bereich **
// Nutzername zum Login
define("ADMIN_LOGIN", "root");
// Passwort zum Login
define("ADMIN_PW", "abc");

// ** Titel **
// Wird oben links angezeigt
define("TITLE", "ITM Infomonitor");

// ** Datum **
// In welchem Format wird das Datum ausgegeben?
define("DATEFORMAT", "d.m.Y H:i");
// Wie oft soll das Datum aktualisiert werden? (Angabe in Sekunden)
define("DATEINTERVAL", 30);

// ** Ticker im Footer **
// Wie schnell soll der Ticker laufen? (Pixel, die in einer Sekunde verschoben werden)
define("TICKERSPEED",100);
// Wie oft soll der Ticker aktualisiert werden? (Angabe in Sekunden)
define("TICKERINTERVAL", 30);

// ** linke und rechte Hälfte **
// Welche Dateiformate werden akzeptiert? (Änderung nicht empfohlen, da Dateitypen sonst event. nicht implementiert.)
// (MIME-Types werden angegeben)
$FILETYPES = array( "application/xhtml+xml", "text/html", "image/gif", "image/jpeg", "image/png", "image/tiff", "image/x-icon", "image/bmp", "image/x-windows-bmp", "image/x-ms-bmp" );
// Alle wie viele Sekunden wird zwischen Folien auf linker und rechter Seite umgeschalten?
define("SLIDETIME", 10);
// Alle wie viele Sekunden soll Inhalt von links u. rechts neu geladen werden?
define("RELOADCONTENT", 15);

// ** Nachtmodus **
// Es kann eine Zeit angegeben werden, in der der Nachtmodus aktiviert wird. Ist dieser aktiv, wird der gesamte Bildschirm schwarz geschalten.
// Um den Nachtmodus zu aktivieren, als Startstunde 0 und als Endstunde 0 eintragen.
define("NIGHT_START", 0); //Startstunde des Nachtmodus (inkl.)
define("NIGHT_END", 0); //Endstunde des Nachtmodus (inkl.)

// ** Anpassungen für eingebundene HTML-Dateien **
// Manche HTML-Dateien müssen angepasst werden, wenn sie im Infomonitor angezeigt werden.
// Dafür befinden sich Konfigurationsdateien im Ordner 'adaptions'. Mit diesem Schalter wird festgelegt, welche Konfigurationsdatei geladen wird (oder ist leer)
define('INSERT_HTML_CONFIG','edupageVertretungsplan');