<?php

require_once 'ConnexionBd.php';
$rqt_InsertActeur = mysqli_prepare($conn, "INSERT INTO acteur VALUES (?, ?, ?, ?)");
$rqt_InsertRole = mysqli_prepare($conn, "INSERT INTO role VALUES (?, ?)");

$rqt_Acteur = mysqli_prepare($conn, "Select nom From acteur Where idActeur LIKE ?");

if(isset($_POST["NomActeur"])){
    if(isset($_POST["PrenomActeur"])){
        if(isset($_POST["DateNais"])){
            if(isset($_POST["RoleSerie"])){
                
                $nom = $_POST["NomActeur"];
                $prenom = $_POST["PrenomActeur"];
                
                $DebutIdActeur = strtoupper(substr($prenom, 0,1).substr($nom, 0,1));
                $IdPattern = $DebutIdActeur."%";
               
                mysqli_stmt_bind_param($rqt_Acteur, "s", $IdPattern);
                mysqli_stmt_execute($rqt_Acteur);
                mysqli_stmt_store_result($rqt_Acteur);
                
                //nombre d'acteur même initiale
                $nbAct = mysqli_stmt_num_rows($rqt_Acteur);
                echo $nbAct;
                $numAct = sprintf("%02d",$nbAct+1);
                
                $IdActeur = $DebutIdActeur.$numAct;
                $dateNais = $_POST["DateNais"];
                
                
                mysqli_stmt_bind_param($rqt_InsertActeur,"ssss",$IdActeur,$nom,$prenom,$dateNais);
                mysqli_stmt_execute($rqt_InsertActeur);
                
                
                
                mysqli_stmt_bind_param($rqt_InsertRole,"ss",$IdActeur,$_POST["RoleSerie"]);
                mysqli_stmt_execute($rqt_InsertRole);
                
                header('Location:admin.php');
            }
        }
    }
}
header('Location:admin.php');



?>