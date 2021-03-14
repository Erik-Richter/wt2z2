<?php

include_once ("../config.php");
$dbname = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=zadanie2", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<h1>Olympijské Hry</h1>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

$sql = "SELECT id, name, surname FROM person";
$stm = $conn->query($sql);
$people = $stm->fetchAll(PDO::FETCH_ASSOC);

echo '
<form action="#" method="POST">
    <select name="Olympionik">';
    foreach ($people as $person){
        echo
        '<option value="'.$person['id'] .'">' .$person['name'] ." " .$person['surname'] .'</option>'
        ;
    }

