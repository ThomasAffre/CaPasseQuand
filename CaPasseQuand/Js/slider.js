$(document).ready(function(){
	$("#fleche_gauche").click(function() {
		var margin = $("#listeBanniere").css("left");
		var m = margin.substr(0,margin.length-2);
		margin = parseInt(m,10);
		$("#listeBanniere").animate({
			left:margin+950
		})
	});
});

$(document).ready(function(){
	$("#fleche_droite").click(function() {
		var margin = $("#listeBanniere").css("left");
		var m = margin.substr(0,margin.length-2);
		margin = parseInt(m,10);
		$("#listeBanniere").animate({
			left:margin-950
		})//css("left",margin+950);
		
	});
});
