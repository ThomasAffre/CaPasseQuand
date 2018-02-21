/**
 * 
 */
function TriAlphabetique(){
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById("DivResultat").innerHTML = this.responseText;
	        }
	    };
	    xmlhttp.open("GET", "ajax/triAlphbetique.php",true );
	    xmlhttp.send();
}

function TriDate(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("DivResultat").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "ajax/TriDate.php",true );
    xmlhttp.send();
}

function TriGenre(){
	
}

function RechercheAlpha(str){
	if (str.length == 0) { 
        document.getElementById("DivResultat").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("DivResultat").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax/RechercheSerie.php?q=" + str, true);
        xmlhttp.send();
    }
}