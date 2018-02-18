var numSerie =0;

$(document).ready(function(){
	$("#fleche_gauche").click(function() {
		//att fin animation en cours
		
		
		var margin = $("#listeBanniere").css("left");
		var m = margin.substr(0,margin.length-2);
		margin = parseInt(m,10);
		numSerie = numSerie == 0 ? $("#listeBanniere li").length - 1 : numSerie-1;
		$("#listeBanniere").animate({
			left:numSerie*-950
		});
		var noSerie = $("#listeBanniere > li:nth-child("+(numSerie+1)+") img").attr("alt");
		$("#banniere_description b").text(noSerie);
	});
});

$(document).ready(function(){
	$("#fleche_droite").click(function() {
		var margin = $("#listeBanniere").css("left");
		var m = margin.substr(0,margin.length-2);
		margin = parseInt(m,10);
		
		numSerie = numSerie == $("#listeBanniere li").length - 1 ? 0 : numSerie+1;

		$("#listeBanniere").animate({
			left:numSerie*-950
		});
		var image = ((Math.abs(margin-950))/ 950)+1;
		var noSerie = $("#listeBanniere > li:nth-child("+(numSerie+1)+") img").attr("alt");
		$("#banniere_description b").text(noSerie);
		
	});
});

function waitfct(){
	wait = 1;
}
