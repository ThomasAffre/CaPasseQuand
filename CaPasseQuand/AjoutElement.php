<?php

require_once 'ConnexionBd.php';
$rqt_InsertSerie = mysqli_prepare($conn, "INSERT INTO serie VALUES (?, ?, ?, ?, ?)");
$rqt_Serie = mysqli_prepare($conn,"SELECT IdSerie FROM serie WHERE IdSerie=?");


if(isset($_POST["NomSerie"])){
    if(isset($_POST["Realisateur"])){
        if(isset($_POST["SynopsisSerie"])){         
            
            $Id = "";
            $str = $_POST["NomSerie"];
            $str_tab = explode(" ", $str);
            if(count($str_tab) > 1){
                foreach ($str_tab as $name){
                    $Id = $Id.strtoupper(substr($name,0,1));
                }
            }else{
                $Id = $Id.strtoupper(substr($str,0,2));
            }
            
            mysqli_stmt_bind_param($rqt_Serie, "s", $Id);
            mysqli_stmt_execute($rqt_Serie);
            mysqli_stmt_store_result($rqt_Serie);
            if(mysqli_stmt_num_rows($rqt_Serie)>0){
                $Id = $Id.mysqli_stmt_num_rows($rqt_Serie);
            }
            
            $strChemin = "donnees/".strtolower(implode("", $str_tab));
           
            mkdir($strChemin ,0777);
            mkdir($strChemin."/image" ,0777);
            mkdir($strChemin."/texte" ,0777);
            $file = fopen($strChemin."/texte/serie.txt", "x+");
            fputs($file, $_POST["SynopsisSerie"]);
            fclose($file);
            
            $chemin =$strChemin."/texte/serie.txt";
            
            mysqli_stmt_bind_param($rqt_InsertSerie, "sssss", $_POST["NomSerie"], $_POST["Realisateur"], $strChemin, $Id,$_POST["Genre"]);
            mysqli_stmt_execute($rqt_InsertSerie);
            
            header('Location:admin.php');
            
        }
    }
}
header('Location:admin.php');

?>