<p><a href="index.php" class="oldpath">Acceuil</a> > Compte</p>
<section class="user_account">
    <?php
        $user = App\Session::getUser();
        // var_dump($user);
        ?>

    <div class="left">
            <?php
 
            ?>
            <img src="public/img/user/<?= $user->getPseudo() ?>.jpg" alt="image de <?= $user->getPseudo() ?>">


            <h2><?= $user->getPseudo() ?></h2>
            <a href="#">Profil</a>
            <hr>
            <a href="#">Bilbliothèque</a>
            <hr>
            <a href="#">Post crée</a>

            <h2>Ancienneté</h2>
            <p><?= date('d/m/Y à H:i',strtotime($user->getUserCreation())) ?></p>
    </div>
 
    <div class="right">
        <img src="public/img/user/<?= $user->getPseudo() ?>.jpg" alt="image de <?= $user->getPseudo() ?>">
        <button type="button">Changer l'avatar</button>
        <p>Pseudo : <?= $user->getPseudo() ?></p>
        <button type="button">Changer le pseudo</button>
        <p>Mail (facultatif):<?= $user->getEmail() ?></p>
        <button type="button">Changer le mail</button>
        <p>Mot de passe: ********</p>
        <button type="button">Changer le mot de passe</button>
        <p>Qui voit mon profil? </p>
        <ul>
            <li>Tout le monde</li>
            <li>Seuleument mes amis</li>
            <li>Moi uniquement</li>
        </ul>
        <button type="button">Supprimer mon compte</button>

    </div>
    
</section>