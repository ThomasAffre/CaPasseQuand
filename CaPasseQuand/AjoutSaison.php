<?php
require_once 'ConnexionBd.php';
$rqt_InsertSaison = mysqli_prepare($conn, "INSERT INTO saison VALUES (?, ?, ?, ?)");
$rqt_saison = mysqli_prepare($conn, "SELECT s.nom FROM serie s JOIN saison sa ON sa.IdSerie = s.idSerie WHERE s.IdSerie = ?");

if(isset($_POST["SaisonSerie"])){
        if(isset($_POST["SynopsisSaison"])){   
           
            $serie = $_POST["SaisonSerie"];
            
            mysqli_stmt_bind_param($rqt_saison, "s", $serie);
            mysqli_stmt_execute($rqt_saison);
            mysqli_stmt_store_result($rqt_saison);
            
            //numSaison
            $nbSais = mysqli_stmt_num_rows($rqt_saison);
            $numSais = sprintf("%02d",$nbSais+1);
            
            //idSaison
            $idSaison = $serie."S".$numSais;
            
            //SynopsisSaison
            mysqli_stmt_bind_result($rqt_saison, $nom);
            mysqli_stmt_fetch($rqt_saison);
            
            $strChemin = "donnees/".strtolower(str_replace(" ","",$nom));
            $file = fopen($strChemin."/texte/saison".$numSais.".txt", "x+");
            fputs($file, $_POST["SynopsisSaison"]);
            fclose($file);
            
            mysqli_stmt_bind_param($rqt_InsertSaison, "ssss", $idSaison,$strChemin,$numSais,$serie);
            mysqli_stmt_execute($rqt_InsertSaison);
            header('Location:admin.php');
            
        }
}

?>