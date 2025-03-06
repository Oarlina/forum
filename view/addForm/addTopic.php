<section class="add">
    <?php
        $books = $result['data']['books'];
        $category = $result['data']['category'];
        //if(App\Session::getUser()){
            // si l'utilisateur est connecter
    ?>
    <form action="index.php?ctrl=forum&action=addTopicBDD&id=<?= $category->getId() ?>" method="post">
            <select name="book" id="">
                <option value="default">Choissisiez le livre du post :</option>
                <?php foreach( $books as $book){ ?>
                    <option name="<?= $book->getId() ?>"><?= $book->getTitle() ?></option>
                <?php } ?>
            </select>

            <label for="">Titre du post : </label> 
            <input type="text" name="title">



            <button value="submit" name="submit">Valider </button> <br>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>

    </form>
</section>