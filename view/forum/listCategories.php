<p><a href="index.php" class="oldpath">Acceuil </a> > Lecture</p>
<section class="listCategories">
    <div class="left">
        <?php
    $categories = $result["data"]['categories']; 
    $posts = $result["data"]['posts']; 
    $users = $result["data"]['users'];
    

    foreach($categories as $category){
        ?>
        <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId()?>"><?= $category->getTypeCategory() ?></a></p>
        <?php } ?>
    </div>

    <div class="right">
        <?php
        foreach($posts as $post){
            ?>
            <div class="onePost">
                <h2><a href="#"><?= $post->getPseudo() ?></a></h2>
                <p class="date"><?= $post->getDatePost() ?></p>
                <p><a href="index.php?ctrl=forum&action=post&id=<?= $post->getId() ?>"><?= $post->getTextPost() ?></a></p>
                <i class="fa-solid fa-message"></i>
                <img src="public/img/heart-message.png" alt="heart message">
            </div>
            <?php } ?>
    </div>
</section>
