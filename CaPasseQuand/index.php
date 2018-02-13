<!DOCTYPE html>
<html>
<head>
<meta charset="AINSI" />
<link rel="stylesheet" href="Css/style.css" />

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Ça passe quand</title>
</head>

<body>
	<header>
		<div id="titre_principal">
			<div id="logo">
				<img src="images/logo.jpg" alt="Logo" />
				<h1>Ça passe quand?</h1>
			</div>
			<h2></h2>
		</div>

		<nav>
			<ul>
				<li id="Btn_Accueil"><a href="#">Accueil</a></li>
				<li><a id="Btn_Calendrier" href="#">Calendrier</a></li>
				<li><a href="#">Recherche</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
	</header>
	<SECTION>
		<div class="conteneur" id="DivAccueil">
			<div id="banniere_image">
				<img src="images/banniere_got.png" alt="Logo" />
				<div id="banniere_description">
					Game of Thrones <a href="#" class="bouton_rouge">Voir le calendrier
						<img src="images/flecheblanchedroite.png" alt="" />
					</a>
				</div>
			</div>

			<div>
					<article>
						<h1>Salut a tous</h1>
						<p>COUCOU</p>
						<p>COUCOU</p>
						<p>COUCOU</p>
					</article>
				<aside>
					<h1>S�rie du moment</h1>
					<img src="images/bulle.png" alt="" id="fleche_bulle" />
					<p id="miniature">
						<img src="images/miniature_got.jpg" />
					</p>
					<p>BLA BLA BLA</p>
					<p>BLA BLA BLA</p>
				</aside>
			</div>
		</div>
		<!-- Autre page -->
		<!-- <div class="conteneur" id="divExemple"></div> -->

		<div class="conteneur" id="DivCalendrier">
			<?php
require_once 'calendrier.php';
?>
		</div>

		<script src="Js/navigation.js"></script>


	</SECTION>

	<footer>
		<div id="tweet">
			<h1>Prochain épisode</h1>
			<p>Tartuffe</p>
			<p>Aujourd'hui a 17h05</p>
		</div>

	</footer>
</body>
</html>
