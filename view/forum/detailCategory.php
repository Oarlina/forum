<a href="index.php?ctrl=forum&action=index"><i class="fa-solid fa-arrow-left-long"></i> Retour</a>
<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Topics pour <?= $category?></h1>

<?php
foreach($topics as $topic ){  
    ?>
    <p><a href="#"><?= $topic ?></a> par <?= $topic->getUser()->getPseudo() ?></p>
<?php }


