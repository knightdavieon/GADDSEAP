<?php
$servername = "sql167.main-hosting.eu.";
$username = "u805029426_gadds";
$pass = "password";
try {
    $conn = new PDO("mysql:host=$servername;dbname=u805029426_gadds", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
