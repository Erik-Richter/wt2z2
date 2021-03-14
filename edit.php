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

if(isset($_POST['name']) && !empty($_POST['name'])){
    $id = null;
    if(empty($_POST['id'])){
        // pridanie usera
        var_dump($_POST);
        $sql = "INSERT INTO person (name, surname, birth_day, birth_place, birth_country, death_day, death_place, death_country) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; // name of input
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['name'], $_POST['surname'], $_POST['dob'], $_POST['pob'], $_POST['bc'], $_POST['dod'], $_POST['pod'], $_POST['dc']]);

        $id = $conn->lastInsertId();

    } else {
        // uprava usera
        $sql = "UPDATE person SET name=?, surname=?, birth_day=?, birth_place=?, birth_country=?, death_day=?, death_place=?, death_country=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['name'], $_POST['surname'], $_POST['dob'], $_POST['pob'], $_POST['bc'], $_POST['dod'], $_POST['pod'], $_POST['dc'], $_POST['id']]);
        $id = $_POST['id'];
    }



    $sql = "SELECT * from person WHERE id=?";  // zobrazenie udajov
    $stm = $conn->prepare($sql);
    $stm->bindValue(1, $id);
    $stm->execute();

    $person = $stm->fetch(PDO::FETCH_ASSOC);
    header('Location: /shottiZ2/detail.php?id='.$id);
}

else if(isset($_GET['id'])){
    $sql = "SELECT * from person WHERE id=?";
    $stm = $conn->prepare($sql);
    $stm->bindValue(1, $_GET['id']);
    $stm->execute();

    $person = $stm->fetch(PDO::FETCH_ASSOC);
    //var_dump($person);

} else{
    //header('Location: '."../404.html");
}



?>

<!doctype html>

<html lang="sk">
<head>
  <meta charset="utf-8">

  <title>Úprava Olympionikov</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1><a id="pageHeader" href="index.php"> <img src="img/13765.png" alt="ikona_olympijskych_hier" height="51" width="51">lympijské hry</a></h1>
    <form action="edit.php" method="post">

        <div class="container">
        <div class="row">
            <h2>Detaily olympionika</h2>
            <div class="col-lg-6">
                <fieldset>
                    <legend>Osobné údaje</legend>

                    <div class="row">
                        <input name="id" type="hidden" value="<?php echo isset($person["id"]) ? $person["id"] : null; ?>">

                        <label class="col-5" for="name">Meno</label>
                        <input class="col-6" id="name" name="name" type="text" value="<?php echo isset($person["name"]) ? $person["name"] : null; ?>">

                        <label class="col-5" for="surname">Priezvisko</label>
                        <input class="col-6" id="surname" name="surname" type="text" value="<?php echo isset($person["surname"]) ? $person["surname"] : null; ?>">
                    </div>
                    <br>
                </fieldset>
            </div>
            <div class="col-lg-6">
                <fieldset>
                <legend>Narodenie</legend>
                <div class="row">
                    <label class="col-5" for="dob">Dátum narodenia</label>
                    <input class="col-6" id="dob" name="dob" type="text" value="<?php echo isset($person["birth_day"]) ? $person["birth_day"] : null; ?>">

                    <label class="col-5" for="pob">Rodné mesto</label>
                    <input class="col-6" id="pob" name="pob" type="text" value="<?php echo isset($person["birth_place"]) ? $person["birth_place"] : null; ?>">

                    <label class="col-5" for="bc">Štát</label>
                    <input class="col-6" id="bc" name="bc" type="text" value="<?php echo isset($person["birth_country"]) ? $person["birth_country"] : null; ?>">
                </div>
                    <br>
                </fieldset>
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
                <fieldset>
                <legend>Úmrtie</legend>
                <div class="row">
                    <label class="col-5" for="dod">Dátum úmrtia</label>
                    <input class="col-6" id="dod" name="dod" type="text" value="<?php echo isset($person["death_day"]) ? $person["death_day"] : null; ?>">

                    <label class="col-5" for="pod">Mesto úmrtia</label>
                    <input class="col-6" id="pod" name="pod" type="text" value="<?php echo isset($person["death_place"]) ? $person["death_place"] : null; ?>">

                    <label class="col-5" for="dc">Štát</label>
                    <input class="col-6" id="dc" name="dc" type="text" value="<?php echo isset($person["death_country"]) ? $person["death_country"] : null; ?>">
                </div>
                    <br>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <p></p>
            <input class="btn btn-outline-warning" type="submit" value="Uložiť">
            <?php
            echo '<p></p><a class="btn btn-outline-success" href="detail.php?id='.$_GET['id'].'">Zrušiť úpravy</a>';
            ?>
        </div>






        </div>
    </form>
</body>
</html>
