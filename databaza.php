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

$sql = "select person.id,person.name,person.surname,oh.year,oh.country,oh.city,oh.type,placing.discipline
from person,oh,placing 
where person.id = placing.person_id and placing.oh_id = oh.id and placing.placing = 1";
$stm = $conn->query($sql);
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row){
    echo "<tr><td>" . '<a class="inverseLink" href="detail.php?id=' .$row["id"]. '">' .$row["name"] ."</a></td><td>" .'<a class="inverseLink" href="detail.php?id=' .$row["id"] .'">' . $row["surname"] . "</a></td><td>" . $row["year"] . "</td><td>" . $row["country"] . "</td><td>" . $row["city"] . "</td><td>" . $row["type"] . "</td><td>" . $row["discipline"] .'</td>'. '<td>'.'<a href="edit.php?id=' . $row["id"]. '">'.'Upraviť</a>'.'/'.'<a class="warn" href="delete.php?id=' . $row["id"]. '">'.'Vymazať</a>'  .'</td></tr>';
}
