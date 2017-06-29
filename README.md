# infomonitor
Ein einfacher in PHP geschriebener Infomonitor, der ohne Datenbank betrieben werden kann.

![monitor](https://user-images.githubusercontent.com/20777899/27708884-8f99d136-5d1a-11e7-84f6-dea7482c8ebf.jpg)

## (1) Titel
In der config.php wird ein Titel festgelgt, der immer oben links sichtbar ist.

## (2) Datum/Uhrzeit
Die aktuelle Uhrzeit wird immer oben rechts angezeigt. Über die config.php kann die Formatierung des Datums sowie das Aktualisierungsintervall der Uhrzeit festgelegt werden.

## (3) und (4) Inhalte links und rechts
Über eine Admin-Oberfläche können Bilder und/oder HTML-Seiten als Inhalte hochgeladen und festgelegt werden. Wenn für eine Seite mehrere Inhalte definiert werden, wird automatisch nach einer definierbaren Zeit zwischen diesen gewechselt. Wenn die HTML-Seiten zu lang sind, werden diese automatisch gescrollt.

## (5) Ticker
Am unteren Bildschirmrand kann ein durchlaufender Ticker mit beliebigem Text (HTML-Formatierung) gefüllt werden. Die Geschwindigkeit des Tickers wird ebenfalls in der config.php festgelgt.
