<?php
    $topic = $result["data"]["topic"];
?>
<section class="add">
    <form action="index.php?ctrl=forum&action=addPostBDD&id=<?= $topic->getId() ?>" method="POST">
        <?php
        //if(App\Session::getUser()){
            // si l'utilisateur est connecter
        ?>
            <label for="">Entrer votre réponse : </label> <br>
            <textarea name="text"></textarea> <br>
            <button type="submit" name="submit" value="submit">Valider </button>
        </form>
            <?php //}else{ ?>
            <!-- <p>Veuillez vous connecter.</p> -->
        <?php //} ?>

</section>