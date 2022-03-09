<h1>Задачи:</h1>
<table border='1'>
    <?php
    echo '<tr>
            <th>id</th>
            <th>Имя</th>
            <th>Описание</th>
            <th>Создана</th>
            <th>Выполнить до</th>
            <th>Выполнено</th>
            <th>Категория</th>
            <th>Действие</th>
           </tr>';
    $result = $conn->query("SELECT *, task.id AS id_task, category.name AS cname, task.name AS tname FROM task, category WHERE task.id_category=category.id AND task.id_user=".$_SESSION['id']);
    while ($row = $result->fetch()) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>
              <td>'.$row['tname'].'</td>
              <td>'.$row['description'].'</td>
              <td>'.$row['created_at'].'</td>
              <td>'.$row['deadline'].'</td>
              <td>'.$row['done'].'</td>
              <td>'.$row['cname'].'</td>';

        echo '<td><a href=deletetask.php?id='.$row['id_task'].'>Удалить</a></td>';
        echo '</tr>';
    }
    ?>
</table>
