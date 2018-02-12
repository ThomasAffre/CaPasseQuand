<?php

$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername,"root","");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<?php 
$DateFirst = mktime(0, 0, 0, date("m")  , date("d")-intval(date("N")), date("Y"));
// difference 86400 par jour  
$strfirstDayWeek = date("d/m/Y",$DateFirst );

$sql = "SELECT id, numEpisode, nomEpisode, heure FROM Episode WHERE Date = \'".$firstDayWeek."\'";
?>



<ul id="semaine">
	<li class="journee">
		<div id="bandeau">


			<div class="DateComplete">
				<p class="Date">01/12</p>
				<p class="Jour">Lundi</p>
			</div>
			<div id="AllEpisode">
				<div class="Episode">
					<ol class="puce">
						<li class="heure">12h45</li>
					</ol>
					<p class="nomSerie">Game</p>
					<p class="nomEpisode">Tartuffe a la plage</p>
					<p class="numEpisode">S01E11</p>
					<img src="images/miniature_got.jpg" class="Miniature_calendrier" />
				</div>

				<div class="Episode">
					<ol class="puce">
						<li class="heure">15h30</li>
					</ol>
					<p class="nomSerie">
						test1 vvvvvvv<br />
					</p>
					<p class="nomEpisode">Ta</p>
					<p class="numEpisode">S01E12</p>
					<img src="images/miniature_got.jpg" class="Miniature_calendrier" />
				</div>

				<div class="Episode">
					<ol class="puce">
						<li class="heure">15h30</li>
					</ol>
					<p class="nomSerie">test2</p>
					<p class="nomEpisode">Tartuffe a la récré</p>
					<p class="numEpisode">S01E13</p>
					<img src="images/miniature_got.jpg" class="Miniature_calendrier" />
				</div>
			</div>
		</div>
	</li>
	
</ul>
