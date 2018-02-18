<?php
$database = "capassequand";
$servername = "localhost";
$username = "username";
$password = "password";

//Create connection
$conn = mysqli_connect($servername, "root", "",$database);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


for($i = 1 ; $i < 6;$i++){
    $chemin = $_POST["bannniere".$i];
    $sql = "Update ListBanniere Set banniere = '".$chemin."' Where id = '".$i."'";
}
?>