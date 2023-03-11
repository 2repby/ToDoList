<?php require 'app/views/header.php'?>
<h1>Сведения о пользователе:</h1>

            <?=$data['user']->firstname?>
            <?=$data['user']->lastname?><br>
            <?=$data['user']->email?>
<?php require 'app/views/footer.php'?>