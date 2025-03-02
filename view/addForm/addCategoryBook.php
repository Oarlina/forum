<?php
    $book = $result['data']['book'];
    $categories = $result['data']['categories'];
?>
<section class="add">
    <form action="index.php?ctrl=form&action=addCategoryBookBDD&id=<?= $book->getId() ?>" method="post">
        <?php
            //if(App\Session::getUser()){
            // si l'utilisateur est connecter
        ?>
            <label for="">Entrer la ou les catégories du livre : <?= $book->getTitle()?> :</label> <br>

            <?php foreach ($categories as $category){ ?>
                <label for="<?= $category->getId() ?>">
                    <input type="checkbox" name="<?= $category->getId() ?>" value="<?= $category->getId() ?>"> <?= $category->getTypeCategory() ?>
                </label>
            <?php } ?>
            <button value="submit" name='submit'>Valider </button> <br>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>
    </form>
</section>