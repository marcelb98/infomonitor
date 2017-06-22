// Initialisiert JS
function init(DATEINTERVAL, TICKERINTERVAL) {
	//DATEINTERVAL: wie oft wird Datum aktualisiert?
	//TICKERINTERVAL: wie oft wird Ticker aktualisiert?
	
	datumLaden(DATEINTERVAL);
	tickerLaden(TICKERINTERVAL);
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
        console.log("ERROR: datumLaden(): "+data);
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
        console.log("ERROR: tickerLaden(): "+data);
    });
	window.setTimeout('tickerLaden('+waitTime+')', waitTime*1000);
	
	return true;
}