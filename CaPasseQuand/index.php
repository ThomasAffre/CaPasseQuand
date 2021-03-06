<!DOCTYPE html>
<?php 
$database = "capassequand";
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, "root", "",$database);

// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$rqt_Acceuil = "SELECT a.idSerie as Id,message,s.synopsisSerie as syno 
                FROM accueil a 
                JOIN serie s ON s.idSerie = a.idSerie";

?>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="Css/style.css" />

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="Js/slider.js"></script>
	<script type="text/javascript" src="ajax/recherche.js"></script>
	
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
				<li id="Btn_Accueil"><a>Accueil</a></li>
				<li id="Btn_Calendrier"><a>Calendrier</a></li>
				<li id="Btn_Recherche"><a>Recherche</a></li>
				<li id="Btn_Contact"><a>Contact</a></li>
			</ul>
		</nav>
	</header>
	<SECTION>
		<div class="conteneur" id="DivAccueil">
			<?php 
			 require_once 'Banniere.php';
			?>

			<div>
					<article>
						<p>
						<?php
			$result_accueil = mysqli_query($conn, $rqt_Acceuil);
			if (mysqli_num_rows($result_accueil) > 0) {
			    $row =  mysqli_fetch_assoc($result_accueil);
			    echo $row["message"];
			
			    ?>
						</p>
					</article>
				<aside>
				<?php 
				$file = fopen($row["syno"]."/texte/serie.txt", 'r+');
				?>
					<h1>Série du moment</h1>
					<img src="images/bulle.png" alt="" id="fleche_bulle" />
					<p id="miniature">
						<img src="<?php echo $row["syno"];?>/image/M.jpg" />
					</p>
					<p><?php echo fgets($file,150);?>...</p>
				</aside>
			</div>
		</div>
		<?php fclose($file); } ?>
		<!-- Autre page -->
		<!-- <div class="conteneur" id="divExemple"></div> -->

		<div class="conteneur" id="DivCalendrier">
			<?php
                require_once 'calendrier.php';
            ?>
		</div>

		<div class="conteneur" id="DivRecherche">
			<?php
                require_once 'recherche.php';
            ?>
		</div>

		<div class="conteneur" id="DivContact">
			<?php
                require_once 'contact.html';
            ?>
		</div>

		<script src="Js/navigation.js"></script>


	</SECTION>

	<footer>
	<?php

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
