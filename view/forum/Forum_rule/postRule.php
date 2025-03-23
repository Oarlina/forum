<?php
    $posts = $result['data']['posts'];
    $topic = $result['data']['topic'];
?>
<p>
    <a href="index.php" class="oldpath"> Acceuil</a>  >  
    <?php if($topic->getCategory()->getId() == 14){?>
        <a href="index.php?ctrl=forum&action=community" class="oldpath">Communauté</a> > 
    <?php }else { ?>
        <a href="index.php?ctrl=forum&action=Forum_rule" class="oldpath">Forum</a> > 
    <?php } ?>
    <a href="index.php?ctrl=forum&action=<?= $topic->getCategory()->getTypeCategory()?>"> <?= $topic->getCategory()->getTypeCategory()?></a>
</p>
<h1 class="title"><?=$topic->getTitle()?></h1>


<section class="pos">
    <?php if(App\Session::getUser()){ ?>
        <p><a href="index.php?ctrl=forum&action=postForm&id=<?= $topic->getId()?>"><button>Ajouter un premier message</button></a></p> 
    <?php } ?>
    <?php 
    if ($posts != null){ 
    foreach($posts as $post){
        if ($post->getUser() == "Compte supprimé") { 
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