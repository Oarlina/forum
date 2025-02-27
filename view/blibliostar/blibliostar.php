<p><a href="index.php" class="oldpath">Acceuil </a> > Blibliostar</p>
<?php
    $books = $result["data"]['books'];
    // var_dump($result);
?>
    <button>Ajouter un livre</button>
    <p>Vérifier que votre livre n'est pas dans la liste</p>
<section class="blibliostar">
    <?php foreach ($books as $book){ ?>
        <div class="book">
            <img src="public/img/books/<?= str_replace(" ", "", $book->getTitle())?>.<?= image_type_to_extension()?>" alt="couverture de <?= $book->getTitle()?>">
            <p><?= $book->getTitle()?></p>
            <p><?= $book->getAuthor()?></p>
        </div>
    <?php } ?>
    
</section>