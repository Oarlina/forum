<?php
    $topic = $result["data"]["topic"];
?>
<section class="add">
    <form action="index.php?ctrl=forum&action=addPostBDD&id=<?= $topic->getId() ?>" method="POST">
            <label for="">Entrer votre réponse : </label> <br>
            <textarea name="text"></textarea> <br>
            <button type="submit" name="submit" value="submit">Valider </button>
        </form>

</section>