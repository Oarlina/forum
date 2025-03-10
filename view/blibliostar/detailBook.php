<?php 
    $book = $result['data']['book'];
    $categories = $result['data']['categories'];
    $topics = $result['data']['topics'];
?>
<p><a href="index.php" class="oldpath">Acceuil </a> > <a href="index.php?ctrl=forum&action=blibliostar" class="oldpath">Blibliostar </a> > <?= $book->getTitle() ?></p>
<section class="book">
    <div class="oneBook">
        <div class="under">
            <img src="<?= $book->getImg() ?>" alt="couverture de <?= $book->getTitle() ?>">
            <div class="right">
                <p class="title"><b> <?= $book->getTitle() ?> </b></p>
                <p><u>Auteur :</u> <?= $book->getAuthor() ?></p>
                <p><u>Editeur :</u> <?= $book->getEdition() ?></p>
                <p><u> Date de sortie :</u> <?= $book->getReleaseDate() ?></p>
                <p><u>Nombre de pages :</u> <?= $book->getNumberPage() ?></p>
                <p><u>Genres :</u> 
                    <?php foreach($categories as $category){ ?>
                        <?= $category ?>, 
                    <?php } ?>
                </p>
                <p><u>Résumé :</u> <?= $book->getSummary() ?></p>
            </div>
        </div>
    </div>
    <div class="listTopics">
        
        <?php 
        // var_dump($topics['topics']);die;
        if ($topics == null){
            ?> <p>Aucun topic lier au livre !</p> <?php
        }else{
        foreach($topics as $topic){ ?>
            <a href="index.php?ctrl=forum&action=postsByTopics&id=<?= $topic->getId()?>"><?= $topic->getTitle() ?></a> <br>
        <?php }}if(App\Session::getUser()){ ?>
        <a href="index.php?ctrl=forum&action=topicBookForm&id=<?= $book->getId()?>"><button>Ajouter un topic</button></a>
        <?php } ?>
    </div>
</section>