<?php
    if(isset($_SESSION['msg']) or isset($msg)){
        echo '<div class="alert alert-info" role="alert">';
        echo $_SESSION['msg'];
        echo $msg;
        echo '</div>';
    }

?>