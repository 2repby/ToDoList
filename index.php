<h1>Эти изменения сделал kda</h1>
<h2>Эти изменения сделал kda вот время занятий с группой 609-12 и yvi</h2>
<h3>Эти изменения сделал yvi</h3>
<?php
    require "dbconnect.php";
    echo ("<table border='1'>");

    $result = $conn->query("SELECT * FROM category");
    while ($row = $result->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td><td>' . $row['name'] . '</td>';
        echo '<td><a href=deletecategory.php?id='.$row['id'].'>Удалить</a></td>';
        echo '</tr>';
    }
    echo ("</table>");
?>
<h1>Создание категории</h1>
<form method="get" action="insertcategory.php">
    <input type="text" name="name">
    <input type="submit" value="Создать">
</form>

