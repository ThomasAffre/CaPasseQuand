<?php
$database = "capassequand";
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, "root", "",$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>