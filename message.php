<?php
    if(isset($_SESSION['msg']) or isset($msg)){
        echo '<div>';
        echo $_SESSION['msg'];
        echo $msg;
        echo 1111111111;
        echo '</div>';
    }
    $_SESSION['msg']= '';
?>


<!-- Modal -->

<div class="modal fade in" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#exampleModal").modal('show');
    });
</script>
