<?php
$servername = "localhost:3310";
$username = "root";
$password = "";
$dbname= "saydalina";

// Author Name: Alaeddine Boubaker - alaeddineboubaker@gmail.com 
// PHP, Laravel and Codeignitor Developer

$conn = new mysqli($servername, $username, $password,$dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>