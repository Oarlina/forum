<p><a href="index.php" class="oldpath">Acceuil </a> > Lecture</p>
<section class="listTopics">
    <div class="left">
        <?php
    $categories = $result["data"]['categories']; 
    $topics = $result["data"]['topics']; 
    $users = $result["data"]['users'];
    

    foreach($categories as $category){
        ?>
        <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId()?>"><?= $category->getTypeCategory() ?></a></p>
        <?php } ?>
        <a href="index.php?ctrl=form&action=addCategoryForm"><button>Ajouter une catégorie</button></a>
    </div>

    <div class="right">
        <?php
        foreach($topics as $topic){
            ?>
            <div class="onePost">
                <h2><a href="index.php?ctrl=forum&action=postsByTopics&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a></h2>
                <p class="date"><?= $topic->getCreationDate() ?></p>
                <p><?= $topic->getUser()->getPseudo() ?></p>
                <a href="index.php?ctrl=forum&action=postsByTopics&id=<?= $topic->getId() ?>"><i class="fa-solid fa-message"></i></a>
                <img src="public/img/heart-message.png" alt="heart message" class="heartMessage">
            </div>
            <?php } ?>
    </div>
</section>
