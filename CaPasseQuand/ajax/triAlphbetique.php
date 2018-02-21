<?php
require_once '../ConnexionBd.php';
$rqt_Serie = "SELECT IdSerie, nom, realisateur, synopsisSerie as syno FROM serie Order by nom ASC";


$Series ="";
// lookup all hints from array if $q is different from ""
$resultSelect = mysqli_query($conn, $rqt_Serie);

if (mysqli_num_rows($resultSelect) > 0) {
    // output data of each row
    
        
    while($row = mysqli_fetch_assoc($resultSelect)){
        $img = $row["syno"]."/image/M.jpg";
        $file = fopen("../".$row["syno"]."/texte/serie.txt", 'r+');
        $Series .= "<div class=\"resultat\">
            	<img alt=\"".$row["nom"]."\" src=\"".$img."\">
            	<h2>".$row["nom"]."</h2>
            	<p class=\"realisateur\"><b>Réalisateur : </b>".$row["realisateur"]."</p>
            	<p class=\"synopsis\">".fgets($file,150)."...</p>
            </div>";
        fclose($file);
        }
        
}else{
    $Series = "Probleme";
}

// Output "no suggestion" if no hint was found or output correct values
    echo $Series;

?>