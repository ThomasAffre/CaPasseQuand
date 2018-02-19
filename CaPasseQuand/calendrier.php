<?php

$JoursSemaine = array( "Lundi", "Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");

?>





<ul id="semaine">

<?php
$today =  mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$DateFirst = mktime(0, 0, 0, date("m"), date("d") - intval(date("N")), date("Y"));
// difference 86400 par jour


for ($i = 0; $i < 7; $i ++) {
    $Date = $DateFirst+($i*86400);
    $strfirstDayWeek = date("Y-m-d", $Date);
    
    $sql = "SELECT ep.numEpisode as Num, ep.nomEpisode as nomEp, ep.heureSortieEpisode as heure,
                   s.numSaison as saison, s.synopsisSaison as cheminSaison, se.nom as serie
              FROM episode ep 
                JOIN saison s ON s.idSaison = ep.numSaison 
                JOIN serie se ON se.idSerie = s.IdSerie  
            WHERE dateSortieEpisode = '" . $strfirstDayWeek . "' Order by heure";
    ?>

	<li class="journee">
		<div id="bandeau">


			<div class="DateComplete">
				<p class="Date"><?php echo date("d/m",$Date);?></p>
				<p class="Jour"><?php echo $JoursSemaine[$i];?></p>
			</div>
			<div id="AllEpisode">
			
			<?php 
			$result = mysqli_query($conn, $sql) ;
			
			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			    ?>
				<div class="Episode">
					<ol class="puce">
						<li class="heure"><?php echo substr($row["heure"],0,5);?></li>
					</ol>
					<p class="nomSerie"><?php echo $row["serie"];?></p>
					<p class="nomEpisode"><?php echo $row["nomEp"];?></p>
					<p class="numEpisode"><?php echo "S".sprintf("%02d",$row["saison"])."E".sprintf("%02d",$row["Num"])?></p>
					<img src="<?php echo $row["cheminSaison"];?>/image/M.jpg" class="Miniature_calendrier" />
				</div>

				<?php 
			    }
			}
			
			?>
			</div>
		</div>
	</li>
	<?php
}
// finJour
?>
</ul>
