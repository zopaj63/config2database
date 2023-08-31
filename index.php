<?php

require_once "./Database.php";

$db = Database::getInstance();
$connection = $db->getConnection();

$query = "SELECT * FROM korisnici";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
        echo "Ime: " . $row['ime'] ."<br>". "Prezime: " . $row['prezime'] ."<br>"."E-mail: " . $row['email'] ."<br>"."Status: " . $row['status'] ."<br>"."<br>";
    }

?>