<?php
    $categories = $result["data"]['categories']; 
    ?>

<h1>Liste des catégories</h1>

<?php
foreach($categories as $category){ var_dump($category);
?>
    <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getTypeCategory() ?></a></p>
<?php } ?>


  
