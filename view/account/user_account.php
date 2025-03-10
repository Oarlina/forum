<p><a href="index.php" class="oldpath">Acceuil</a> > Compte</p>
<section class="user_account">
    <?php
        $user = App\Session::getUser();
        ?>

    <div class="left">
            <img src="<?= $user->getAvatar()?>" alt="image de <?= $user->getPseudo() ?>">

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
        <img src="<?=$user->getAvatar()?>" alt="image de <?= $user->getPseudo() ?>">
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
        <a href="index.php?ctrl=forum&action=deleteUserAccount&id=<?= APP\Session::getUser()->getId() ?>"><button>Supprimer mon compte</button></a>

    </div>
    
</section>