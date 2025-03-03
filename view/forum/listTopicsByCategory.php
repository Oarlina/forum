
<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
    ?>
<p><a href="index.php" class="oldpath"> Acceuil</a> > <a href="index.php?ctrl=forum&action=index" class="oldpath">Lecture</a> > <?= $category ?></p>

<section class="detailCategory">

    <h1>Topics pour <?= $category?> :</h1>
    <a href="index.php?ctrl=forum&action=topicForm&id=<?= $category->getId()?>"><b>Ajouter un topic dans <?= $category ?> </b></a>
    <?php
    foreach($topics as $topic ){  
        ?>
        <p><a href="index.php?ctrl=forum&action=post&id=<?= $topic->getId()?>"><?= $topic->getTitle() ?></a> par <?= $topic->getUser()->getPseudo() ?></p>
        <?php }


?>
</section>