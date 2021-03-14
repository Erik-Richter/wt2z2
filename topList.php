<!doctype html>

<html lang="sk">
<head>
  <meta charset="utf-8">

  <title>Top 10</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
<h1><a id="pageHeader" href="index.php"> <img src="img/13765.png" alt="O" height="51" width="51">lympijské hry</a></h1>

    <main>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Miesto v rebríčku</th>
                    <th>Meno</th>
                    <th>Priezvisko</th>
                    <th>Počet zlatých medailí</th>
                    <th>Úpravy</th>
                </tr>
            </thead>
            <tbody>
                <?php include ("topListL.php"); ?>
                <td><img src="img/gold-trophy.png" </td>
            </tbody>
        </table>
    </main>
</body>
</html>
