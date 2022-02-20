<?php
    if(isset($_GET['logout']))
    {
        setcookie("firstname","kda",time()-999999);
    }
    if(isset($_GET['login'])){
        setcookie("firstname",$_GET['login'],time()+15000);
    }
    if (isset($_COOKIE['firstname']))
    {
        echo ('Привет, '.$_COOKIE['firstname'].'!');
        echo ('<a href=cookie.php?logout=1>Выйти из системы<a>');
    }
    else{
        echo ('<a href=cookie.php?login=kda>Войти<a>');
    }


