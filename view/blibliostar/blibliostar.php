<p><a href="index.php" class="oldpath">Acceuil </a> > Blibliostar</p>
<?php
    $books = $result["data"]['books'];
?>
    <a href="index.php?ctrl=form&action=bookForm"><button>Ajouter un livre</button></a>
    <p>Vérifier que votre livre n'est pas dans la liste</p>
<section class="blibliostar">
    <?php foreach($books as $book){?>
        <div class="book">
            <p><?=$book->getTitle()?></p>
            <p><?= $book->getAuthor()?></p>

        </div>

    <?php } ?>
</section>