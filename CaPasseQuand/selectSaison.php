<?php
require_once 'ConnexionBd.php';
$rqt_saison = mysqli_prepare($conn, "SELECT s.IdSerie,sa.numSaison FROM serie s JOIN saison sa ON sa.IdSerie = s.idSerie WHERE s.idSerie = ?");

$q = $_REQUEST["q"];

$options ="";
// lookup all hints from array if $q is different from ""
if ($q !== "") {
    mysqli_stmt_bind_param($rqt_saison, "s", $q);
    mysqli_stmt_execute($rqt_saison);
    mysqli_stmt_store_result($rqt_saison);
    if(mysqli_stmt_num_rows($rqt_saison)> 0){
        mysqli_stmt_bind_result($rqt_saison, $idSerie,$numSaison);
        
        while(mysqli_stmt_fetch($rqt_saison)){
            $options .= "<option value=\"".$numSaison."\">Saison ".$numSaison."</option>";
        }
        
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $options;

?>