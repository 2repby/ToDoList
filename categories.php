<h1>Категории задач:</h1>
<table class="table table-striped">
<?php
$result = $conn->query("SELECT * FROM category WHERE id_user=". $_SESSION['id']);
while ($row = $result->fetch()) {
    echo '<tr>';
    echo '<td>' .  $row['id']. '</td><td>' . $row['name'] . '</td>';
    echo '<td><a href=deletecategory.php?id='.$row['id'].'>Удалить</a></td>';
    echo '</tr>';
}
?>

<?php if (isset($_SESSION['login'])): ?>

</table>
<h2>Создание категории</h2>
<form method="get" action="insertcategory.php">
    <input type="text" name="name">
    <input type="submit" value="Создать">
</form>

<?php endif ?>