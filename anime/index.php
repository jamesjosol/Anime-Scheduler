<?php session_start();
include "../db.php";
include "./_anime-form_modal.php";


$stm = $pdo->query("SELECT * FROM animes ORDER BY release_date");
$data = $stm->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../_header.php" ?>
    <title>Anime Schedule</title>  
    <?php include "../_success_msg.php"; ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#b3ffff;">
        <div class="container">
            <a class="navbar-brand" href="../">Anime Scheduler</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="../">Home</a>
                    <a class="nav-item nav-link active" href="#">Anime</a>
                    <a class="nav-item nav-link" href="../manga">Manga</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col mt-3">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Title</th>
                        <th>Episode</th>
                        <th>Release</th>
                        <th>Release Type</th>
                        <th>URL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $anime): ?>
                    <tr style="border-radius: 10% !important;">
                        <td><?= $anime->name ?></td>
                        <td class=""><i><span style="font-size: 1.5em; font-weight:bold;"><?= $anime->current_episode ?></span> / <span style="font-size:0.9em"><?= $anime->episodes ?></span></i></td>
                        <td><?= $anime->release_date ?></td>
                        <td><?= $anime->release_type ?></td>
                        <td><a href="<?= $anime->url ?>" target="_blank" class="btn btn-primary btn-sm">Watch</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a class="button_ btn-primary" style="text-decoration: none;" href="" data-toggle="modal" data-target="#animeFormModal">Add Anime</a>
        </div>
    </div>

</body>

</html>