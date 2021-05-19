<?php if(isset($_SESSION['success_msg'])): ?>
<script>
    $(document).ready(function(){
        $("#success_msg_modal").modal("show");
    });
    setTimeout(function(){
        $("#success_msg_modal").modal("hide")
    }, 2200);
</script>
<div class="modal fade bd-example-modal-sm" id="success_msg_modal" tabindex="-1" role="dialog" aria-labelledby="success_msg_modal" aria-hidden="true">
    <div class="modal-dialog modal-md alert alert-success  text-center">
        <?= $_SESSION['success_msg'] ?>
    </div>
</div>
<?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>
