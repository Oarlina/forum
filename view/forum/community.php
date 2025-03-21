<p><a href="index.php" class="oldpath">Acceuil </a> > Communauté</p>
<section class="community">

    <?php
        $category = $result["data"]['category']; 
        $topics = $result["data"]['topics']; 
    ?>

<section >
<?php if(App\Session::isAdmin()){?>
        <a href="index.php?ctrl=forum&action=FaqReglementForm&id=<?= $category->getId()?>"><button>Ajouter un Topic </button></a>  
<?php }

    if ($topics == null){
        ?> <p>Aucun topic existant</p> <?php
    }else {
    foreach ($topics as $topic){
        ?> <p><a href="index.php?ctrl=forum&action=postsByTopicsRule&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?> </a></p>  <?php // j'affiche le topic de FAQ
    } }
?>
</section>