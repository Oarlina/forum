<?php
    $posts = $result["data"]["posts"];
    $topic = $result["data"]["topic"];
    $book = $result["data"]["book"];
?>
<p>
    <a href="index.php" class="oldpath"> Acceuil</a> 
    > 
    <a href="index.php?ctrl=forum&action=index" class="oldpath">Lecture</a> 
    > 
    <?= $topic->getTitle()?>
</p>
<section class="book">
    <div class="oneBook">
        <p class="title"><b> <?= $book->getTitle() ?> </b></p>
        <div class="under">
            <img src="public/img/books/<?= $book->getTitle() ?>" alt="couverture de <?= $book->getTitle() ?>">
            <div class="right">
                <p>Auteur : <?= $book->getAuthor() ?></p>
                <p>Editeur : <?= $book->getEdition() ?></p>
                <p> Date de sortie : <?= $book->getReleaseDate() ?></p>
                <p>Résumé : <?= $book->getSummary() ?></p>
                <p>Nombre de pages : <?= $book->getNumberPage() ?></p>
            </div>
        </div>
    </div>
</section>
<section class="pos">
    <?php foreach($posts as $post){?>
    <div class="top">
        <h1><?= $post->getTextPost()?></h1>
        <p><?=$post->getUser()->getPseudo()?></p>
        <p><?= $post->getDatePost()?></p>

        <a href="index.php?ctrl=forum&action=postForm&id=<?= $topic->getId() ?>"><i class="fa-solid fa-message"></i></a>
        <img src="public/img/heart-message.png" alt="heart message" class="heartMessage">
    </div>
    <?php } ?>
    <div class="bottom">

    </div>
</section>