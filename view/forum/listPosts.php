
<section class="listPosts">
    <div class="left">
        <?php
    $posts = $result["data"]['posts']; 
    $users = $result["data"]['users'];
    
    foreach($posts as $post){
        ?>
        <div class="onePost">
            <h2><a href="#"><?= $post->getPseudo() ?></a></h2>
            <p class="date"><?= $post->getDatePost() ?></p>
            <p><?= $post->getTextPost() ?></p>
            <i class="fa-solid fa-message"></i>
            <img src="public/img/heart-message.png" alt="heart message">
        </div>
        <?php } ?>
    </div>
    <div class="right">
        
        </div>
</section>
