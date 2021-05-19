<?php
if(isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $flag = true; 
    $st = $pdo->prepare("SELECT * FROM manga WHERE id=:id");
    $st->execute([':id' => $id]);
    $manga = $st->fetch();
}
?>

<link rel="stylesheet" href="../css/bootstrap.min.css">
<div class="modal fade" id="mangaUpdateForm" tabindex="-1" role="dialog" aria-labelledby="mangaUpdateFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgba(36, 36, 36, 0.9) !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="mangaUpdateFormLabel">Update Manga</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="document.location='./'" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="process_update.php" method="post">
                <div class="modal-body" style="text-align: left;">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $manga->name ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label>Current Chapter</label>
                        <input type="number" name="current_chapter" id="current_chapter" value="<?= $manga->current_chapter ?>" class="form-control" required>
                    
                    </div>

                    <div class="form-group">
                        <label>Release/Air Date</label>
                        <input type="date" name="release_date" class="form-control" value="<?= $manga->release_date ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label>Release Type</label>
                        <select id="release_type" name="release_type" class="form-control sel">
                            <option value="Weekly" class="opt" <?php echo $manga->release_type=="Weekly" ? 'selected' : ''?>>Weekly</option>
                            <option value="Monthly" class="opt" <?php echo $manga->release_type=="Monthly" ? 'selected' : ''?>>Monthly</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" name="url" class="form-control" value="<?= $manga->url ?>" required>
                        
                    </div>
                </div>
                <div class="clearfix">
                    <button class="button_ deletebtn btn-success" type="submit" name="update_manga" id="add_mangabtn"><i class="fa fa-check"></i> Done</button>
                    <button class="button_ cancelbtn btn-info" type="button" onclick="document.location='./'" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>