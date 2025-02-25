<a href="index.php"><i class="fa-solid fa-arrow-left-long"></i> Retour</a>


<div class="left">
    <?php
    $posts = $result["data"]['posts']; 
    $users = $result["data"]['users'];

    foreach($posts as $post){
    ?>
        <p><a href="#"><?= $post->getPseudo() ?></a></p>
        <p><a href="#"><?= $post->getDatePost() ?></a></p>
        <p><a href="#"><?= $post->getTextPost() ?></a></p>
    <?php } ?>
</div>
<div class="right">

</div>
