$(document).ready(function(){
	$("#fleche_gauche").click(function() {
		var margin = $("#listeBanniere").css("left");
		var m = margin.substr(0,margin.length-2);
		margin = parseInt(m,10);
		$("#listeBanniere").animate({
			left:margin+950
		})
		var image = ((Math.abs(margin+950))/ 950)+1;
		var noSerie = $("#listeBanniere > li:nth-child("+image+") img").attr("alt");
		$("#banniere_description b").text(noSerie);
	});
});

$(document).ready(function(){
	$("#fleche_droite").click(function() {
		var margin = $("#listeBanniere").css("left");
		var m = margin.substr(0,margin.length-2);
		margin = parseInt(m,10);
		$("#listeBanniere").animate({
			left:margin-950
		})
		var image = ((Math.abs(margin-950))/ 950)+1;
		var noSerie = $("#listeBanniere > li:nth-child("+image+") img").attr("alt");
		$("#banniere_description b").text(noSerie);
		
	});
});
