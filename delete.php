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
echo '
Hello delete ' .$_GET['id'];

$sql = "DELETE FROM person WHERE person.id=?";
$delStm = $conn->prepare($sql);
$delStm->execute([$_GET['id']]);

header('Location: /shottiZ2/');