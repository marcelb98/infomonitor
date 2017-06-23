// Initialisiert JS
var anzahlLinks = 0; //wie viele Elemente gibt es links?
var anzahlRechts = 0; // ...und rechts?
var linksAktuell = 0; // ID des aktuell sichtbaren Elements links 
var rechtsAktuell = 0; // ..und rechts
md5Links = ''; //Prüfsumme von HTML linker Bereich
md5Rechts = '';

function init(DATEINTERVAL, TICKERINTERVAL, SLIDETIME, RELOADCONTENT) {
	//DATEINTERVAL: wie oft wird Datum aktualisiert?
	//TICKERINTERVAL: wie oft wird Ticker aktualisiert?
	//SLIDETIME: alle wie viele sek. wird links/rechts umgeschalten?
	//RELOADCONTENT: alle wie viele sek. wird links/rechts neu geladen
	
	datumLaden(DATEINTERVAL);
	tickerLaden(TICKERINTERVAL);
	window.setTimeout('chkNewContent('+RELOADCONTENT+')', RELOADCONTENT*1000);
	
	//Elemente links und rechts zählen
	anzahlLinks = $("#left .left").length;
	anzahlRechts = $("#right .right").length;
	if(anzahlLinks > 0){ linksAktuell = anzahlLinks; } //aktuelles Element muss letztes sein, damit bei erstem Aufruf 1. Element gezeigt wird
	if(anzahlRechts > 0){ rechtsAktuell = anzahlRechts; }
	bildschirmSchalten(SLIDETIME);
}

//Datum neu laden
function datumLaden(waitTime) {
	$.ajax({
        url : './ajax/datumAbrufen.php',
        type : 'get',
        data : 'silence=golden'
    }).done(function (data) {
        // Antwort
        console.log(data);
        $("#datum").html(data);
    }).fail(function() {
        // Bei Fehler
        $("#datum").html(" ");
        console.log("ERROR: datumLaden()");
    });
	window.setTimeout('datumLaden('+waitTime+')', waitTime*1000);
	
	return true;
}

//Ticker neu laden
function tickerLaden(waitTime) {
	$.ajax({
        url : './ajax/tickerAbrufen.php',
        type : 'get',
        data : 'silence=golden'
    }).done(function (data) {
        // Antwort
        console.log(data);
        $("#ticker").html(data);
    }).fail(function() {
        // Bei Fehler
        $("#ticker").html(" ");
        console.log("ERROR: tickerLaden()");
    });
	window.setTimeout('tickerLaden('+waitTime+')', waitTime*1000);
	
	return true;
}

// Bildschirm links/rechts schalten
function bildschirmSchalten(SLIDETIME){
	if(anzahlLinks > 0){
			//Links muss etwas getan werden
			$("#l"+linksAktuell).css('display','none'); //aktuelles abschalten
			linksAktuell = linksAktuell + 1; //nächste ID 
			if(linksAktuell > anzahlLinks){ linksAktuell = 1; } //Überlaufen der ID
			$("#l"+linksAktuell).css('display','block'); //neues anschalten
	}
	if(anzahlRechts > 0){
			//Rechts muss etwas getan werden
			$("#r"+rechtsAktuell).css('display','none'); //aktuelles abschalten
			rechtsAktuell = rechtsAktuell + 1; //nächste ID 
			if(rechtsAktuell > anzahlRechts){ rechtsAktuell = 1; } //Überlaufen der ID
			$("#r"+rechtsAktuell).css('display','block'); //neues anschalten
	}
	
	//Funktion wieder in Warteschleife
	window.setTimeout('bildschirmSchalten('+SLIDETIME+')', SLIDETIME*1000);
}

//iFrame scrollen
function scrollFrame(id){
	var position = $('#'+id).contents().find('body').scrollTop(); //aktuelle Position
	var positionAlt = position;
	position += 10; //neue Position
	$('#'+id).contents().find('body').scrollTop(position);
	
	if(positionAlt == $('#'+id).contents().find('body').scrollTop() ){
			//seite scroll nicht weiter --> wieder nach oben
			$('#'+id).contents().find('body').scrollTop(0);
	}
	
	window.setTimeout('scrollFrame(\''+id+'\')', 500);
}

//MD5-Checksum einer Seite vermerken
function setmd5(seite, md5){
	if(seite == 'links'){
			md5Links = md5;
	}else{
		md5Rechts = md5;
	}
}

//Prüft, ob es neuen Inhalt gibt
function chkNewContent(RELOADCONTENT){
	$.ajax({
        url : './ajax/chkNewContent.php',
        type : 'get',
        data : 'links='+md5Links+'&rechts='+md5Rechts
    }).done(function (data) {
        // Antwort
        if(data == 'y'){
				window.location.reload();
		}
    }).fail(function() {
        // Bei Fehler
        console.log("ERROR: chkNewContent()");
    });	
	window.setTimeout('chkNewContent('+RELOADCONTENT+')', RELOADCONTENT*1000);
}