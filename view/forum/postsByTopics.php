<?php
    $posts = $result["data"]["posts"];
    $topic = $result["data"]["topic"];
    var_dump($topic->getTitle());
?>
<p>
    <a href="index.php" class="oldpath"> Acceuil</a> 
    > 
    <a href="index.php?ctrl=forum&action=index" class="oldpath">Lecture</a> 
    > 
    <?= $topic->getTitle()?>
</p>

<section class="pos">
    <?php foreach($posts as $post){?>
    <div class="top">
        <h1><?= $post->getTextPost()?></h1>
        <p><?=$post->getUser()->getPseudo()?></p>
        <p><?= $post->getDatePost()?></p>

        <a href="index.php?ctrl=form&action=post&id=<?= $topic->getId() ?>"><i class="fa-solid fa-message"></i></a>
        <img src="public/img/heart-message.png" alt="heart message" class="heartMessage">
    </div>
    <?php } ?>
    <div class="bottom">

    </div>
</section>