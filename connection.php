<?php
// Declaring database constants
//require 'filenm.php';
$servername = "localhost";
$serveruser = "root";
$serverpass = "";
$dbname = "blog_db";

//Create the database connection
$conn = new mysqli($servername, $serveruser, $serverpass, $dbname);

// Check connection
if ($conn->connect_error){
die("Connection Failed: ". $conn->connect_error);
}
// echo "Connected Successfully to ". $dbname;
?>