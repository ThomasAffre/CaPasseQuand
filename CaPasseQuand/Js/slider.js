function chargement_img(){
	for(var i = 0 ; i < 10 ; i++){
		document.getElementById("slider_img").innerHTML += "<img class='img_slider' src='img/img"+(i+1)+".jpg'/>"
	}
	document.getElementById("slider_img").style.left = "-260px"
};

function PreviousImg(){
	var position = document.getElementById("slider_img").style.left;
	position = parseInt(position.substr(0,(position.length-2)));
	position +=240;
	if(position > 0){
		position = -2180
	}
	document.getElementById("slider_img").style.left=position+"px";
}

function NextImg(){
	var position = document.getElementById("slider_img").style.left;
	position = parseInt(position.substr(0,(position.length-2)));
	position -=240;
	if(position < -2200){
		position = -20
	}
	document.getElementById("slider_img").style.left=position+"px";
}