<?php
    $posts = $result['data']['posts'];
    $topic = $result['data']['topic'];
    $book = $result['data']['book'];
    $firstPost = $result['data']['firstPost'];
    if ($firstPost->getUser() == NULL) { 
        $pseudoFp = "Compte supprimé";
    } else {
        $pseudoFp = $firstPost->getUser()->getPseudo();
    }
?>
<?php 
    if ($topic->getCategory()->getId() == 12 || $topic->getCategory()->getId() == 13 ) {
        ?>
<p>
    <a href="index.php" class="oldpath"> Acceuil</a>  >  <a href="index.php?ctrl=forum&action=Forum_rule" class="oldpath">Règlement</a> > <?= $topic->getTitle()?>
</p>
<?php 
    }else if ($topic->getCategory()->getId() == 14) {
?>
<p>
    <a href="index.php" class="oldpath"> Acceuil</a>  >  <a href="index.php?ctrl=forum&action=community" class="oldpath">Communauté</a> > <?= $topic->getTitle()?>
</p>
<?php 
    } else {
        ?>
<p>
    <a href="index.php" class="oldpath"> Acceuil</a>  >  <a href="index.php?ctrl=forum&action=index" class="oldpath">Lecture</a> > <?= $topic->getTitle()?>
</p>
<h1 class="title"><?=$topic->getTitle()?></h1>
<section class="book">
    <div class="oneBook">
        <p class="title"><b> <?= $book->getTitle() ?> </b></p>
        <div class="under">
            <img src="<?= $book->getImg() ?>" alt="couverture de <?= $book->getTitle() ?>">
            <div class="right">
                <p><u>Auteur :</u> <?= $book->getAuthor() ?></p>
                <p><u>Editeur :</u> <?= $book->getEdition() ?></p>
                <p> <u>Date de sortie :</u> <?= $book->getReleaseDate() ?></p>
                <p><u>Résumé :</u> <?= $book->getSummary() ?></p>
                <p><u>Nombre de pages :</u> <?= $book->getNumberPage() ?></p>
            </div>
        </div>
    </div>
</section>
<?php 
    } 
?>
<section class="firstPost">
<h1><?= $firstPost->getTextPost()?></h1>
        <p><u>Createur du post :</u> <?=$pseudoFp?></p>
        <p><?= $firstPost->getDatePost()?></p>
        
        <?php if(App\Session::getUser()){ ?>
            <a href="index.php?ctrl=forum&action=postForm&id=<?= $topic->getId() ?>"><button class="fa-solid">Repondre</button></a>
        <?php } ?>
        <img src="public/img/heart-message.png" alt="heart message" class="heartMessage">
</section>

<section class="pos">
    <?php 
    if ($posts != null){ 
    foreach($posts as $post){
        if ($post->getUser() == "Compte supprimé" || $post->getUser() == null) { 
            $pseudo = "Compte supprimé";
        } else {
            $pseudo = $post->getUser()->getPseudo();
        }?>
    <div class="top">
        <h2><?= $post->getTextPost()?></h2>
        <p><?= $pseudo ?></p>
        <p><?= $post->getDatePost()?></p>

        <?php if(App\Session::getUser()){ ?>
            <a href="index.php?ctrl=forum&action=postForm&id=<?= $topic->getId() ?>"><i class="fa-solid fa-message"></i></a>
        <?php } ?>
        <img src="public/img/heart-message.png" alt="heart message" class="heartMessage">
    </div>
    <?php } }else { echo "Aucune conversation ! ";}?>
    <div class="bottom">

    </div>
</section>