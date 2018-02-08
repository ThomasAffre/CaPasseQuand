$(document).ready(function(){
	$('.conteneur').slideUp();
	$('#DivAccueil').slideDown();


	jQuery('#Btn_Calendrier').click(function () {
		jQuery('.conteneur').slideUp("fast");
		jQuery('#DivCalendrier').delay("fast").slideDown("fast");
	});
	
	jQuery('#Btn_Accueil').click(function () {
		jQuery('.conteneur').slideUp("fast");
		jQuery('#DivAccueil').delay("fast").slideDown("fast");
	});

}); 