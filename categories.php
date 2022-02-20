<h1>Категории задач:</h1>
<table border='1'>
<?php
$result = $conn->query("SELECT * FROM category");
while ($row = $result->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td><td>' . $row['name'] . '</td>';
    echo '<td><a href=deletecategory.php?id='.$row['id'].'>Удалить</a></td>';
    echo '</tr>';
}
?>
</table>
<h2>Создание категории</h2>
<form method="get" action="insertcategory.php">
    <input type="text" name="name">
    <input type="submit" value="Создать">
</form>