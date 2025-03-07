
<section class="listPosts">
    <div class="left">
        <?php
    $posts = $result["data"]['posts']; 
    $users = $result["data"]['users'];
    
    foreach($posts as $post){
        if ($post->getUser()->getPseudo() == NULL) { 
            $pseudo = "Compte supprimé";
        } else {
            $pseudo = $post->getUser()->getPseudo();
        }
        ?>
        <div class="onePost">
            <h2><a href="#"><?= $pseudo ?></a></h2>
            <p class="date"><?= $post->getDatePost() ?></p>
            <p><?= $post->getTextPost() ?></p>
            <i class="fa-solid fa-message"></i>
            <img src="public/img/heart-message.png" alt="heart message" class="heartMessage">
        </div>
        <?php } ?>
    </div>
    <div class="right">
        
        </div>
</section>
