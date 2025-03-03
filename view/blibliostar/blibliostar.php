<p><a href="index.php" class="oldpath">Acceuil </a> > Blibliostar</p>
<?php
    $books = $result["data"]['books'];
?>
    <a href="index.php?ctrl=form&action=bookForm"><button>Ajouter un livre</button></a>
    <p>Vérifier que votre livre n'est pas dans la liste</p>
<section class="blibliostar">
    <?php foreach($books as $book){?>
        <div class="book">
            <a href="index.php?ctrl=forum&action=OneBook&id=<?= $book->getId()?>">
                <p><?=$book->getTitle()?></p>
                <p><?= $book->getAuthor()?></p>
            </a>
        </div>

    <?php } ?>
</section>