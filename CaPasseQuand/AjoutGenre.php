<?php
require_once 'ConnexionBd.php';
$rqt_InsertGenre = mysqli_prepare($conn, "INSERT INTO genre VALUES (?)");
$rqt_Genre = mysqli_prepare($conn,"SELECT nomGenre FROM genre");


if(isset($_POST["genre"])){
    

    mysqli_stmt_execute($rqt_Genre);
    mysqli_stmt_store_result($rqt_Genre);
    if(mysqli_stmt_num_rows($rqt_Genre)> 0){
        mysqli_stmt_bind_result($rqt_Genre, $idGenre);
        while($row = mysqli_stmt_fetch($rqt_Genre)){
            if(strcmp($_POST["genre"], $row["nomGenre"]) == 0){
                header("location:admin.php?Erreur=Genre déja exsitant");
            }
        }
    }
    
    mysqli_stmt_bind_param($rqt_InsertGenre, "s", $_POST["genre"]);
    mysqli_stmt_execute($rqt_Genre);
    
    header("location:admin.php");
}
    
//header("location:admin.php");
?>
