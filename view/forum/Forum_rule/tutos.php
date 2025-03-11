<p><a href="index.php" class="oldpath"> Acceuil</a> > <a href="index.php?ctrl=forum&action=forum_rule" class="oldpath">Forum</a> > Tutos</p>

<?php 
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<section class="tutos">
    <?php
        if(App\Session::isAdmin()){ ?>
            <a href="index.php?ctrl=forum&action=topicReglementForm&id=<?= $category->getId()?>"><button>Ajouter un tuto </button></a>
    <?php }

    if ($topics == null){
        ?> <p>Aucun topic existant</p> <?php
    }else {
        foreach ($topics as $topic){
            ?> <p><a href="index.php?ctrl=forum&action=postsByTopicsRule&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?> </a></p>  <?php // j'affiche le topic de tuto
        } 
    }
    ?>
</section>