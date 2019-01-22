<?php
$servername = "sql167.main-hosting.eu.";
$username = "u805029426_gadds";
$dbname = "u805029426_gadds";
$pass = "password";

// $servername = "localhost";
// $username = "root";
// $dbname = "gaddseap";
// $pass = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
