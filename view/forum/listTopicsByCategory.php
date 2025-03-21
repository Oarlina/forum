
<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
    ?>
<p><a href="index.php" class="oldpath"> Acceuil</a> > <a href="index.php?ctrl=forum&action=index" class="oldpath">Lecture</a> > <?= $category ?></p>

<section class="detailCategory">

    <h1>Topics pour <?= $category?> :</h1>
    <?php if(App\Session::getUser()){ ?>
        <a href="index.php?ctrl=forum&action=topicForm&id=<?= $category->getId()?>"><button><b>Ajouter un topic dans <?= $category ?> </b></button></a>
    <?php } ?> 
    <?php
    foreach($topics as $topic ){  
        if ($topic->getUser() == NULL) { 
            $pseudo = "Compte supprimé";
        } else {
            $pseudo = $topic->getUser()->getPseudo();
        }
        ?>
        <a href="index.php?ctrl=forum&action=postsByTopics&id=<?= $topic->getId() ?>">
            <div class="onePost">
                    <img class="bookPost" src="<?= $topic->getBook()->getImg() ?>" alt="couverture de <?= $topic->getBook()->getTitle() ?>">
                    <div class="rightPost">
                        <h2><?= $topic->getTitle() ?> | <?= $topic->getBook()->getTitle() ?> - <?= $topic->getBook()->getAuthor() ?></h2>
                        <p class="date"><?= $topic->getCreationDate() ?></p>
                        <p><?= $pseudo ?></p>
                        <i class="fa-solid fa-message"><p></p></i>
                        <img src="public/img/heart-message.png" alt="heart message" class="heartMessage">
                    </div>
                </div>
            </a>
        <?php }


?>
</section>