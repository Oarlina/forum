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
            <input type="checkbox" id="vehicle1" name="<?= $category->getTypeCategory() ?>" value="Bike">
            <label for="vehicle1"> <?= $category->getTypeCategory() ?></label><br>
            <?php } ?>
            <button value="submit" name='submit'>Valider </button> <br>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>

    </form>
</section>