<section class="add">
    <form action="" method="post">
        <?php
            $books = $result['data']['books'];
        //if(App\Session::getUser()){
            // si l'utilisateur est connecter
        ?>
            <select name="" id="">
                <option value="default">Choissisiez le livre du post :</option>
                <?php foreach( $books as $book){ ?>
                    <option value="<?= $book->getId() ?>"><?= $book->getTitle() ?></option>
                <?php } ?>
            </select>
            <button value="submit">Valider </button> <br>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>

    </form>
</section>