<section class="add">
    <form action="onePost">
        <?php
        //if(App\Session::getUser()){
            // si l'utilisateur est connecter
        ?>
            <label for="">Choissisiez le livre du post</label>
            <?php foreach( $books as $book){ ?>
            <select name="" id=""><?= $book->getTitle() ?></select>
            <?php } ?>
            <button value="submit">Valider </button> <br>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>

    </form>
</section>