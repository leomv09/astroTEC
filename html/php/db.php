<?php

$servername = "localhost";
$username = "development";
$password = "12345";
$db = "astroDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$acentos = $conn->query("SET NAMES 'utf8'");
?>