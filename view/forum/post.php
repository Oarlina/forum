<?php
    $post = $result["data"]["post"];
    $topics = $result["data"]["topics"];
    var_dump($topics->getId());
?>
<p>
    <a href="index.php" class="oldpath"> Acceuil</a> 
    > 
    <a href="index.php?ctrl=forum&action=index" class="oldpath">Lecture</a> 
    > 
    <a href="">titre<?php //$post->getTopic_id()->getTitle()?></a>
</p>

<section class="pos">
    <div class="top">
        <h1><?= $post->getTextPost()?></h1>
        <p><?=$post->getUser()->getPseudo()?></p>
        <p><?= $post->getDatePost()?></p>

        <a href="index.php?ctrl=form&action=post&id=<?= $topics->getId() ?>"><i class="fa-solid fa-message"></i></a>
        <img src="public/img/heart-message.png" alt="heart message">
    </div>
    
    <div class="bottom">

    </div>
</section>