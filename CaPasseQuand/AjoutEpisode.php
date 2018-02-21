<?php
require_once 'ConnexionBd.php';
$rqt_saison = mysqli_prepare($conn, "SELECT sa.synopsisSaison FROM episode e JOIN saison sa ON sa.idSaison = e.numSaison WHERE e.numSaison = ?");
$rqt_InsertEpisode = mysqli_prepare($conn, "INSERT INTO episode VALUES (?,?,?,?,?,?,?)");
    
if(isset($_POST["NumSaison"])){
    if(isset($_POST["NomEpisode"])){
        if(isset($_POST["SynopsisEpisode"])){
            if(isset($_POST["DateEpisode"])){
                if(isset($_POST["HeureEpisode"])){
                
                    $serie = $_POST["SaisonSerie"];
                    $saison = $_POST["NumSaison"];
                    
                    $IdSaison = $serie."S".$saison;
                    
                    mysqli_stmt_bind_param($rqt_saison, "s", $IdSaison);
                    mysqli_stmt_execute($rqt_saison);
                    mysqli_stmt_store_result($rqt_saison);
                    
                    //numEp
                    $nbEp = mysqli_stmt_num_rows($rqt_saison);
                    $numEp = sprintf("%02d",$nbEp+1);
                    
                    //idEp numSaison
                    $IdEp = $IdSaison."E".$numEp;
                    
                    mysqli_stmt_bind_result($rqt_saison, $strChemin);
                    mysqli_stmt_fetch($rqt_saison);
                    
                    //synopsie
                   $file = fopen($strChemin."/texte/".$saison.$numEp.".txt", "x+");
                   fputs($file, $_POST["SynopsisEpisode"]);
                   fclose($file);
                
                    //Date heure
                    $StrDate = $_POST["DateEpisode"];
                    $strHeure = $_POST["HeureEpisode"].":00";
                    
                    mysqli_stmt_bind_param($rqt_InsertEpisode, "sssssss", $IdEp,$numEp,$_POST["NomEpisode"],$strChemin,$StrDate,$strHeure,$IdSaison);
                    mysqli_stmt_execute($rqt_InsertEpisode);
                    header('Location:admin.php');
                    
                }
            }
        }
    }
}

header('Location:admin.php');




?>