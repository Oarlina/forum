<?php $categories = $result["data"]["categories"]; ?>

<section class="add">
    <form action="index.php?ctrl=forum&action=addBookBDD" method="post" enctype="multipart/form-data">
        <?php
        //if(App\Session::getUser()){
            // si l'utilisateur est connecter
        ?>
            <label for="">Entrer le titre du livre :</label> <br>
            <input type="text" name="title" class="in"> </input> <br>

            <label for="">Entrer l'auteur du livre :</label> <br>
            <input type="text" name="author" class="in"> </input> <br>

            <label for="">Entrer l'édition du livre :</label> <br>
            <input type="text" name="edition" class="in"> </input> <br>

            <label for="">Entrer la date de sortie du livre :</label> <br>
            <input type="date" name="releaseDate" class="in"> </input> <br>

            <label for="" >Entrer le résumé du livre :</label> <br>
            <textarea name="summary" id="summary" class="in"></textarea>
            <!-- <input class="block" type="text" name="summary"> </input> <br> -->
            
            <label for="">Entrer le nombre de pages du livre :</label> <br>
            <input type="number" name="numberPage" class="in"> </input> <br>

            <label for="">Entrer l'image de couverture du livre : </label>
            <input type="file" name="couvertureLivre" accept="image/*">

            <label for="">Entrer la ou les catégories du livre :</label> <br>
            <?php foreach ($categories as $category){ ?>
                <label for="<?= $category->getId() ?>">
                    <input type="checkbox" name="categories[]" value="<?= $category->getId() ?>"> <?= $category->getTypeCategory() ?>
                </label>
            <?php } ?>


            <button value="submit" name='submit' class="in">Valider </button> <br>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>

    </form>
</section>