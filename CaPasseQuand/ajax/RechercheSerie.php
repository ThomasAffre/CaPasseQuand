<?php
require_once '../ConnexionBd.php';
$rqt_saison = mysqli_prepare($conn, "SELECT Distinct s.IdSerie as idSerie, s.nom as nom, s.realisateur as realisateur, s.synopsisSerie as syno
                                     FROM serie s 
                                     Join saison sa ON sa.IdSerie = s.idSerie 
                                     Join episode e ON sa.idSaison = e.numSaison 
                                     Where UPPER(s.nom) Like UPPER(?) 
                                        OR UPPER(e.nomEpisode) Like UPPER(?)");

$q = $_REQUEST["q"];

$Series ="";
// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $pattern = "%".$q."%";
    mysqli_stmt_bind_param($rqt_saison, "ss", $pattern, $pattern);
    mysqli_stmt_execute($rqt_saison);
    mysqli_stmt_store_result($rqt_saison);
    if(mysqli_stmt_num_rows($rqt_saison)> 0){
        mysqli_stmt_bind_result($rqt_saison, $idSerie,$nom,$realisateur,$syno);
        while($row = mysqli_stmt_fetch($rqt_saison)){
            $img = $syno."/image/M.jpg";
            $file = fopen("../".$syno."/texte/serie.txt", 'r+');
            
            $Series .= "<div class=\"resultat\">
            	<img alt=\"".$nom."\" src=\"".$img."\">
            	<h2>".$nom."</h2>
            	<p class=\"realisateur\"><b>Réalisateur : </b>".$realisateur."</p>
            	<p class=\"synopsis\">".fgets($file,150)."...</p>
            </div>";
            
            fclose($file);
        }
    }
}

echo $Series;
?>