<?php

    $db_name = 'boardgames';
    $db_pass = '2sLbm6fZus48Tu-c';

    if ( isset($_POST['name']) && isset($_POST['author']) && isset($_POST['description']) && isset($_POST['type']) && isset($_POST['cr']) ) {
        $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);

        $sql = "INSERT INTO games (name, author, description, type, cr) 
            VALUES 
            ('{$_POST['name']}', '{$_POST['author']}', '{$_POST['description']}', '{$_POST['type']}', '{$_POST['cr']}')
        ";

        $dbh->query($sql); 
    }
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Board Games</title>
    <link rel="icon" type="image/x-icon" href="media/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <?php include_once('header.php') ?>

    <div class="container">
        <h3 class="mx-auto mt-5 text-justify text-primary-emphasis">Add new game</h3>
        <p class="mx-auto mb-3 text-justify text-primary-emphasis">All fields are mandatory</p>

        <form action="" method="POST">
            <div class="form-group mt-3">
                <label for="name" class="mb-2">Name</label>
                <input name="name" type="text" maxlength="50" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="author" class="mb-2">Author</label>
                <input name="author" type="text" maxlength="50" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="description" class="mb-2">Description</label>
                <input name="description" type="text" maxlength="200" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="type" class="mb-2">Type</label>
                <input name="type" type="text" maxlength="20" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="cr" class="mb-2">CR (Complexity rating): a number between 1-5. See <a href="https://boardgamegeek.com/wiki/page/Weight" target="_blank">this</a> link.</label>
                <input name="cr" type="number" min="1" max="5" step="0.01" class="form-control">
            </div>

            <button class="btn btn-primary mt-3">
                Save
            </button>
        </form>
        <?php 
            // Get games.
            $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);
            $result = $dbh->query("SELECT * FROM games");
            $games = $result->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h3 class="mx-auto mt-5 text-justify text-primary-emphasis">List of Games</h3>

        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>CR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $games as $key => $game ) { ?>
                            <tr>
                                <td><?= $game['id'] ?></td>
                                <td><?= $game['name'] ?></td>
                                <td><?= $game['author'] ?></td>
                                <td><?= $game['description'] ?></td>
                                <td><?= $game['type'] ?></td>
                                <td><?= $game['cr'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
