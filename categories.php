<h1>Категории задач:</h1>
<?php
$result = $conn->query("SELECT category.id AS id, category.name AS cname, category.description AS cdesc, category.picture_url, count(task.id) as C FROM category LEFT OUTER JOIN task ON task.id_category=category.id WHERE category.id_user=".$_SESSION['id']." GROUP BY category.id");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header">Количество задач: ' . $row['C'] . '</div>
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-1">  
                        <img src="'.$row['picture_url'].'" alt="Task picture" height="60px">
                    </div>
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=t" >
                        <h5 class="card-title">' . $row['cname'] . '</h5>
                        <p class="card-text">' . $row['cdesc'] . '</p>
                    </a>
                    </div>
                    <div class="col-md-1">
                        <a href="deletecategory.php?id='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
            
        </div>
 
    ';
//    echo '<tr>';
//    echo '<td>' .  $row['id']. '</td><td>' . $row['name'] . '</td>';
//    echo '<td><a href=deletecategory.php?id='.$row['id'].'>Удалить</a></td>';
//    echo '</tr>';
}
?>



<h2>Создание категории</h2>
<form method="post" action="insertcategory.php" enctype="multipart/form-data">
    <p><label>
            Имя категории: <input type="text" name="name">
        </label>
    <p><label>
            Описание категории: <input type="text" name="description">
        </label>
    <p><label>
            Изображение: <input type="file" name="filename">
        </label>
    <p><input type="submit" value="Создать">
</form>




