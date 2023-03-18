<?php require 'app/views/header.php'?>
    <div class="m-5">
        <h2>Создание категории</h2>
        <form method="post" action="createcategory" enctype="multipart/form-data">
            <p><label>
        Имя категории: <input type="text" name="name">
                </label>
            <p><label>
        Описание категории: <input type="text" name="description">
                </label>
            <p><label>
        Изображение: <input type="file" name="picture">
                </label>
            <p><input type="submit" value="Создать">
        </form>
    </div>
<?php require 'app/views/footer.php'?>