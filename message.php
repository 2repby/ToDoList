<?php
    if(isset($_SESSION['msg']) or isset($msg)){
        echo '<div>';
        echo $_SESSION['msg'];
        echo $msg;
        echo 1111111111;
        echo '</div>';
    }

?>