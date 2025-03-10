<p><a href="index.php" class="oldpath">Acceuil </a> > Blibliostar</p>
<?php
    $books = $result["data"]['books'];
    if(App\Session::getUser()){
?>
    <a href="index.php?ctrl=forum&action=bookForm"><button>Ajouter un livre</button></a>
    <p>Vérifier que votre livre n'est pas dans la liste</p>
    <?php } ?>
<section class="blibliostar">
    <?php foreach($books as $book){?>
        <div class="book">
            <a href="index.php?ctrl=forum&action=detailBook&id=<?= $book->getId()?>">
                <img src="<?= $book->getImg() ?>" alt="couverture de <?= $book->getTitle() ?>">
                <p><?=$book->getTitle()?></p>
                <p><?= $book->getAuthor()?></p>
            </a>
        </div>

    <?php } ?>
</section>