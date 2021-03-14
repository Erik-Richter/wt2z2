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



if(isset($_GET['id'])){
    $sql = "SELECT * from person WHERE id=?";
    $stm = $conn->prepare($sql);
    $stm->bindValue(1, $_GET['id']);
    $stm->execute();

    $person = $stm->fetch(PDO::FETCH_ASSOC);
    showPersonDetails($person);

} else{
    header('Location: '."../404.html");
}

function showPersonDetails($person){
    echo
'<div class="row">
    <h2>Detaily olympionika</h2>
    <div class="col-lg-6">
        <fieldset>
            <legend>Osobné údaje</legend>
            <div class="row">
                <p class="col-6">Meno</p> <p class="col-6">'.$person["name"].'</p>
                <p class="col-6">Priezvisko</p> <p class="col-6">'.$person["surname"].'</p>
            </div><br>
        </fieldset>
    </div>
    <div class="col-lg-6">
        <fieldset>
        <legend>Narodenie</legend>
        <div class="row">
            <p class="col-6">Dátum narodenia</p> <p class="col-6">'.$person["birth_day"].'</p>
            <p class="col-6">Rodné mesto</p> <p class="col-6">'.$person["birth_place"].'</p>
            <p class="col-6">Štát</p> <p class="col-6">'.$person["birth_country"].'</p>
        </div><br>
        </fieldset>
    </div>';

    if (!empty($person["death_day"]) || !empty($person["death_place"]) || !empty($person["death_country"]))
    showDeathDetails($person);
}

function showDeathDetails($person){
    echo '
    <div class="col-lg-6"></div>
    <div class="col-lg-6">
        <fieldset>
        <legend>Úmrtie</legend>
        <div class="row">
            <p class="col-6">Dátum úmrtia</p> <p class="col-6">'.$person["death_day"].'</p>
            <p class="col-6">Mesto úmrtia</p> <p class="col-6">'.$person["death_place"].'</p>
            <p class="col-6">Štát</p> <p class="col-6">'.$person["death_country"].'</p>
        </div><br>
        </fieldset>
    </div>
</div>'
    ;
}
