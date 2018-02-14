<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
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
					<h1>Série du moment</h1>
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
	<?php
$database = "capassequand";
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
// $conn = mysqli_connect($servername, "root", "",$database);

// Check connection
// if (!$conn) {
// die("Connection failed: " . mysqli_connect_error());
// }
$heure = date("H:i");
$date = date("Y-m-d");
$sql = "SELECT nomEpisode, heureSortieEpisode,se.nom as NomSerie
              FROM episode ep
              JOIN saison s ON s.idSaison = ep.numSaison 
              JOIN serie se ON se.idSerie = s.IdSerie  
            WHERE dateSortieEpisode = '" . $date . "' And heureSortieEpisode  > '" . $heure.":00'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result)?>
	
		<div id="EpNext">
			<h1>Prochain épisode</h1>
			<p><?php echo $row["NomSerie"]." - ".$row["nomEpisode"]?></p>
			<p>Aujourd'hui à <?php echo substr($row["heureSortieEpisode"],0,5)?></p>
		</div>
<?php
} else {
   echo" <div id=\"EpNext\">
    <h1>Pas d'autre épisode Aujourd'hui</h1>
		</div>";
}
?>
	</footer>
</body>
</html>
