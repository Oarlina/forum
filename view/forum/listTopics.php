<p><a href="index.php" class="oldpath">Acceuil </a> > Lecture</p>
<section class="listTopics">
    <div class="left">
        <?php
    $categories = $result["data"]['categories']; 
    $topics = $result["data"]['topics']; 
    $users = $result["data"]['users'];
    // $posts = $result['data']['posts'];
    
    
    

    foreach($categories as $category){
        ?>
        <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId()?>"><?= $category->getTypeCategory() ?></a></p>
        <?php } ?>
        <a href="index.php?ctrl=forum&action=addCategoryForm"><button>Ajouter une catégorie</button></a>
    </div>

    <div class="right">
        <?php
        foreach($topics as $topic){
            ?>
                <a href="index.php?ctrl=forum&action=postsByTopics&id=<?= $topic->getId() ?>">
            <div class="onePost">
                    <img class="bookPost" src="<?= $topic->getBook()->getImg() ?>" alt="couverture de <?= $topic->getBook()->getTitle() ?>">
                    <div class="rightPost">
                        <h2><?= $topic->getTitle() ?> | <?= $topic->getBook()->getTitle() ?> - <?= $topic->getBook()->getAuthor() ?></h2>
                        <p class="date"><?= $topic->getCreationDate() ?></p>
                        <p><?= $topic->getUser()->getPseudo() ?></p>
                        <i class="fa-solid fa-message"><p></p></i>
                        <img src="public/img/heart-message.png" alt="heart message" class="heartMessage">
                    </div>
                </div>
            </a>
            <?php } ?>
    </div>
</section>
