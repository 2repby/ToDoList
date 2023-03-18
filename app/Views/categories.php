<?php require 'app/views/header.php'?>
    <h1>Категории задач:</h1>

    <main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Категории</h6>
    </div>
<?php
        foreach ($data['categories'] as $category) { ?>
        <div class="d-flex text-muted pt-3">
            <img src="<?=$category->picture_url?>" alt="Task picture" height="60px">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark"><?= $category->name ?></strong>
                            <?php if($data['user']) {
                            echo('<a href="#"><a href="deletecategory/'.$category->id.'" class="btn btn-danger">Удалить</a>');
                                 } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>


            <?php
        }
?>


            </main>





<?php require 'app/views/footer.php'?>