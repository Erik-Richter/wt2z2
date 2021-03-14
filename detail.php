<html lang="sk">
<head>
    <meta charset="utf-8">

    <title>Detail Olympionika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<h1><a id="pageHeader" href="index.php"> <img src="img/13765.png" alt="ikona_olympijskych_hier" height="51" width="51">lympijské hry</a></h1>
<main class="container">
    <?php
    include ("view.php");
    ?>
    <div class="col-lg-6"></div>
    <div class="row">
        <?php
        echo '<a class="btn btn-outline-warning" href="edit.php?id='.$_GET['id'].'">Upraviť</a>';
        ?>
        <p id="pid1"></p>
        <a class="btn btn-outline-success" href="index.php">Návrat na hlavnú stránku</a><br>
    </div>
</main>

</body>
</html>