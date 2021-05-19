<?php session_start();
include "../db.php";
include "./_manga-form_modal.php";
include "./_update-form_modal.php";
include "./_proceed_confirm_msg.php";


$stm = $pdo->query("SELECT * FROM manga ORDER BY release_date");
$data = $stm->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../_header.php" ?>
    <link rel="stylesheet" href="../css/darkstyle.css">
    <title>Anime Schedule | Manga</title>  
    <?php include "../_success_msg.php"; ?>
</head>
<body class="dark">
    <nav class="navbar navbar-expand-lg navbar-dark nav-bar-darkmode">
        <div class="container">
            <a class="navbar-brand" href="../">Manga Scheduler</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="../">Home</a>
                    <a class="nav-item nav-link" href="../anime/">Anime</a>
                    <a class="nav-item nav-link active" href="#">Manga</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col mt-3">
            <h4><?php echo date('F d (l)'); ?></h4>
            <table class="table">
                <thead>
                    <tr class="table-head text-white">
                        <th>Title</th>
                        <th>Chapter</th>
                        <th>Release</th>
                        <th>Release Type</th>
                        <th>URL</th>
                    </tr>
                </thead>
                <tbody style="color: #dfdfdf;">
                    <?php foreach($data as $manga): ?>
                    <?php $date_formatted = date('F d (l)', strtotime($manga->release_date))?>
                    <tr style="" class="<?php echo (strtotime($manga->release_date) < time()) ? 'released' : ''?>">
                        <td><a href="index.php?update_id=<?= $manga->id ?>" style="color: #dfdfdf; text-decoration:none"><?= $manga->name ?></a></td>
                        <td><i><span style="font-size: 1.5em; font-weight:bold;"><?= $manga->current_chapter ?></span></td>
                        <td><?= $date_formatted ?></td>
                        <td><?= $manga->release_type ?></td>
                        <td><a href="index.php?confirm=<?= $manga->id ?>" class="btn btn-primary btn-sm">Read</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a class="button_ btn-primary" style="text-decoration: none;" href="" data-toggle="modal" data-target="#mangaFormModal">Add Manga</a>
        </div>
    </div>


<?php
if(isset($_GET['confirm'])) {
    echo '<script>
            $(document).ready(function(){
                $("#proceeed_confirm_msg_modal").modal("show");
            });
        </script>';
    unset($_GET['confirm']);
}   

if(isset($_GET['update_id'])) {
    echo '<script>
            $(document).ready(function(){
                $("#mangaUpdateForm").modal("show");
            });
        </script>';
    unset($_GET['update_id']);
}   
?>


<script>
$(document).ready(function(){
    $('.confirm-btn a').click(function(e) {
        $("#proceeed_confirm_msg_modal").modal("hide");
        
        setTimeout(function(){
            document.location='./'
        }, 2200);
    });
});
</script>
</body>

</html>