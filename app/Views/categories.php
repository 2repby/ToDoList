<?php require 'app/views/header.php'?>
    <h1>Категории задач:</h1>
<?php
foreach ($data['categories'] as $category) { ?>

         <div class="card-body text-dark">
            <div class="row" >
                <div class="col-11">
                            <?= $category->name ?>
                </div>
                <div class="col-1">
                    <a href="deletecategory.php" class="btn btn-danger">Удалить</a>
                </div>
            </div>
        </div>

   <?php
}
?>



<?php require 'app/views/footer.php'?>