<?php 
    $book = $result['data']['book'];
    $categories = $result['data']['categories'];
?>
<p><a href="index.php" class="oldpath">Acceuil </a> > <a href="index.php?ctrl=forum&action=blibliostar" class="oldpath">Blibliostar </a> > <?= $book->getTitle() ?></p>
<section class="book">
    <div class="oneBook">
        <p class="title"><b> <?= $book->getTitle() ?> </b></p>
        <div class="under">
            <img src="public/img/books/<?= $book->getTitle() ?>" alt="couverture de <?= $book->getTitle() ?>">
            <div class="right">
                <p>Auteur : <?= $book->getAuthor() ?></p>
                <p>Editeur : <?= $book->getEdition() ?></p>
                <p> Date de sortie : <?= $book->getReleaseDate() ?></p>
                <p>Nombre de pages : <?= $book->getNumberPage() ?></p>
                <p>Genres : 
                    <?php foreach($categories as $category){ ?>
                        <?= $category ?>, 
                    <?php } ?>
                </p>
                <p>Résumé : <?= $book->getSummary() ?></p>
            </div>
        </div>
    </div>
</section>