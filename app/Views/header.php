<?php if($data['user']) { ?>
Текущий пользователь: <?=$data['user']->email?>
        <br>
<a href="/logout">Выйти</a>
<?php } else {?>
<section class="form">
    <div class="container">
        <h1 class="catalog-title">Вход в систему</h1>
        <form method="post" action="/login">
            <p>
                <label for="id1">Логин:</label>
                <input type="text" name="login" id="id1">
            </p>
            <p>
                <label for="id2">Пароль:</label>
                <input type="password" name="password" id="id2">
            </p>
            <p>
            <p><input type="submit" value="Войти"></p>
        </form>
    </div>
</section>
<?php }
echo ($data['message'])


?>
