<section class="add">
    <form action="index.php?ctrl=form&action=CategoryBookForm" method="post">
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

            <button value="submit" name='submit' class="in">Valider </button> <br>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>

    </form>
</section>