<div class="container">





<h1>Задачи:</h1>
    <div class="list-group">




    <?php

    $result = $conn->query("SELECT *, task.id AS id_task, category.name AS cname, task.name AS tname FROM task, category WHERE task.id_category=category.id AND task.id_user=".$_SESSION['id']);
    while ($row = $result->fetch()) {

    echo '

            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="'.$row['picture_url'].'" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">'.$row['tname'].'</h6>
                    <p class="mb-0 opacity-75">'.$row['description'].'</p>
                </div>

                <small class="opacity-50 text-nowrap">Создана: '.$row['created_at'].'<br>Выполнить до: '.$row['deadline'].'</small>
            </div>
        </a>
';


    }
    ?>
</div class="list-group">
</div>