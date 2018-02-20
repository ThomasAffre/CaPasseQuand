<?php
require_once 'ConnexionBd.php';

$rqt_Banniere = mysqli_prepare($conn, "UPDATE banniere SET IdSerie = ? WHERE IdBanniere = ?");
$rqt_Accueil = mysqli_prepare($conn, "UPDATE Accueil SET Message = ?, IdSerie = ?");


for($i=1;$i <= $_POST["NbBandeau"];$i++){
    if(isset($_POST["bandeau".$i])){
        mysqli_stmt_bind_param($rqt_Banniere, "si",$_POST["bandeau".$i],$i);
        mysqli_stmt_execute($rqt_Banniere);
    }
}


if(isset($_POST["descriptAccueil"])){
    if(isset($_POST["miniature"])){
        mysqli_stmt_bind_param($rqt_Accueil, "ss",$_POST["descriptAccueil"],$_POST["miniature"]);
        mysqli_stmt_execute($rqt_Accueil);
    }
}


header('Location:admin.php');

?>