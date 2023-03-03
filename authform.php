<?php
    session_start(["use_strict_mode" => true]);
    if (isset($_SESSION['username'])) {

        ?>

    <p>Вы вошли под именем <?=$_SESSION['username']?></p>
    <p><a href='auth.php?logout=1'>Выйти</a></p>

<?php }
    else{
    ?>

        <form method="post" action="login">
            <div>
                <label for="id1">Логин:</label><br>
                <input name="login" id="id1" type="text" size="20" maxlength="40" >
            </div>
            <div>
                <label for="id2">Пароль:</label><br>
                <input name="password" id="id2" type="password" size="20" maxlength="40" >
            </div>
            <div>
                <input type="submit" value="Войти">
            </div>
        </form>

<?php }
echo ("<p style='color: red'>".$_SESSION['message']."</p>");
unset($_SESSION['message']);

    ?>

