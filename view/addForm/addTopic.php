<section class="add">
    <form action="onePost">
        <?php
        //if(App\Session::getUser()){
            // si l'utilisateur est connecter
        ?>
            <label for="">Entrer le titre du topic :</label> <br>
            <input type="text" class="title"> </input> <br>
            <label for="">Entrer votre réponse : </label> <br>
            <textarea name="text"></textarea> <br>
            <button value="submit">Valider </button> <br>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>

    </form>
</section>