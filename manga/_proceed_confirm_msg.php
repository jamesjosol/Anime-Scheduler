<?php
$flag = false;
if(isset($_GET['confirm'])) {
    $id = $_GET['confirm'];
    $flag = true; 
    $st = $pdo->prepare("SELECT * FROM manga WHERE id=:id");
    $st->execute([':id' => $id]);
    $data = $st->fetch();
}

?>

<link rel="stylesheet" href="../css/bootstrap.min.css">
<div class="modal fade" id="proceeed_confirm_msg_modal" tabindex="-1" role="dialog" aria-labelledby="proceeed_confirm_msg_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgba(36, 36, 36, 1) !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="proceeed_confirm_msg_modalLabel">Update Chapter Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="document.location='./'" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" style="text-align: left;">
                    <h5>Are you want to <u>update the chapter</u> and proceed?</h5>
                    <a href=" <?= $data->url ?>"><i> <?= $data->url ?></i></a>
                </div>
                <div class="clearfix confirm-btn">
                    <a class="button_ deletebtn btn-success" href="./read.php?id=<?= $data->id ?>" style="text-decoration:none;" target="_blank" rel="noopener noreferrer">Proceed & Update</a>
                    <a class="button_ deletebtn btn-primary" href="<?= $data->url?>"  style="text-decoration:none;" target="_blank" rel="noopener noreferrer">Proceed without Update</a>
                </div>
        </div>
    </div>
</div>