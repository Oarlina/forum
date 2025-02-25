
<div class="left">
    <?php
    $categories = $result["data"]['categories']; 
    foreach($categories as $category){
    ?>
        <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId()?>"><?= $category->getTypeCategory() ?></a></p>
    <?php } ?>
</div>
<div class="right">

</div>
