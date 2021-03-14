<?php

include_once("../config.php");
$dbname = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=zadanie2", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<h1>Olympijské Hry</h1>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

$sql = "SELECT person.id, person.name,person.surname, COUNT(placing.placing) AS golds 
                            FROM placing,person where placing.person_id=person.id 
                                                  and placing.placing = 1 
                            group by person.id, person.name, person.surname order by golds desc limit 10";
$stm = $conn->query($sql);
$top10 = $stm->fetchAll(PDO::FETCH_ASSOC);


$iterator = 0;
foreach ($top10 as $person){
    $iterator++;
    echo '<tr>';
    echo '<td>' .$iterator .'</td>';
    echo '<td><a class="inverseLink" href="detail.php?id=' .$person["id"]. '">' .$person["name"] .'</a></td>';
    echo '<td><a class="inverseLink" href="detail.php?id=' .$person["id"]. '">' .$person["surname"] .'</a></td>';
    echo '<td>' ;for ($i=0; $i<$person['golds']; $i++){
        echo '<img src="img/13765.png">';
    }
    echo '</td>';
    echo '<td>' .'<a href="edit.php?id=' . $person["id"]. '">'.'Upraviť</a>'.'/'.'<a class="warn" href="delete.php?id=' . $person["id"]. '">'.'Vymazať</a>' .'</td>';
    echo '</tr>';
}

