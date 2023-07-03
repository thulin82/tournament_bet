<?php
require_once '../src/bootstrap.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled">Disabled</a>
                </div>
            </div>
        </div>
    </nav>
    <code>
        <?php
        $db = new Database($db_options);
        $db->connect();
        $sql = 'SELECT m.id, t.name AS tournament_name, tm1.name AS team1_name, tm2.name AS team2_name, m.match_date
                FROM matches m
                INNER JOIN tournament t ON m.tournament_id = t.id
                INNER JOIN teams tm1 ON m.team1_id = tm1.id
                INNER JOIN teams tm2 ON m.team2_id = tm2.id
                WHERE m.tournament_id = ?';
        $param = array(1);
        $res = $db->executeQueryFetchAll($sql, $param);
        foreach ($res as $row) {
            prePrint($row);
        }
        ?>
    </code>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>