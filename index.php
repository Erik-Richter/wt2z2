<!doctype html>

<html lang="sk">
<head>
    <meta charset="utf-8">

    <title>Olympijske hry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<h1><a id="pageHeader" href="index.php"> <img src="img/13765.png" alt="ikona_olympijskych_hier" height="51" width="51">lympijské hry</a></h1>

<main>
    <div id="tabulka" class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-dark table-hover" id="tabulka">
        <thead>
        <tr>
            <th>Meno</th>
            <th>Priezvisko</th>
            <th>Rok</th>
            <th>Štát</th>
            <th>Mesto</th>
            <th>Typ</th>
            <th>Disciplína</th>
            <th>Úpravy</th>
        </tr>

        </thead>
        <tbody>

            <?php
            include ("databaza.php");
            ?>


        </tbody>
    </table>

    </div>

    <div id="vkladanie">
        <p></p>
        <a class="btn btn-primary" href="edit.php?">Vložiť nový záznam</a>
    </div>

</main>

<script src="js/script.js"></script>
</body>
</html>

