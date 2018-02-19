<div id="banniere_image">
	<div id="fleche_gauche" class="zone_fleche_slider">
		&#8249
	</div>
	<div id="fleche_droite" class="zone_fleche_slider">
		&#8250
	</div>
	<div id="banniere_description">
		<b>Game of Thrones</b>
	</div>
	<?php  
	
	$rqt_banniere = "SELECT num,nom,chemin FROM banniereinfo";
	$result = mysqli_query($conn, $rqt_banniere) ;
	
	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	?>
	<ul id="listeBanniere" style="width:<?php echo mysqli_num_rows($result) ?>00%" >
	<?php 
        while($row = mysqli_fetch_assoc($result)) {
            echo "<li>
		              <img src=\"".$row["chemin"]."/image/B.jpg\" alt=\"".$row["nom"]."\" />
	               </li>";
        }
	}
    ?>
	</ul>
</div>
<?php
?>