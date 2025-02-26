
<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
    ?>
<p><a href="index.php" class="oldpath"> Acceuil</a> > <a href="index.php?ctrl=forum&action=index" class="oldpath">Lecture</a> > <?= $category ?></p>

<section class="detailCategory">

    <h1>Topics pour <?= $category?></h1>

    <?php
    foreach($topics as $topic ){  
        ?>
        <p><a href="#"><?= $topic ?></a> par <?= $topic->getUser()->getPseudo() ?></p>
        <?php }


?>
</section>