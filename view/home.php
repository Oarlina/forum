<div class="home_box">
    <div class="left_box">
        <div class="forum">
            <a href="index.php?ctrl=forum&action=Forum_rule">
                <h3>Règlement</h3>
                <p>Retrouvez-ici toutes les infos du forum et accéder directement à la FAQ pour éclaircir vos doutes.</p>
            </a>
        </div>
        <div class="reading">
        <a href="index.php?ctrl=forum&action=index">
            <h3>Forum</h3>
            <p>Plongez dans ce bloc pour explorer une variété de genres de lecture et trouver celui qui vous passionne le plus.</p>
        </a>
        </div>
    </div>
    <div class="community">
        <a href="index.php?ctrl=forum&action=community">
            <h3>Communauté</h3>
            <p>Accédez ici à la communauté du forum et restez informé sur tous les évènements à venir.</p>
        </a>
        </div>
    <div class="right_box">
        <div class="blibliostar">
            <a href="index.php?ctrl=forum&action=blibliostar">
                <h3>Blibliostar</h3>
                <p>Elle permet de parcourir l'ensemble des ouvrages et d'explorer leur contenu.</p>
            </a>
        </div>
        <div class="account">
            <?php if(App\Session::getUser()){ ?>
            <a href="index.php?ctrl=forum&action=user_account&id=<?= App\Session::getUser()->getId() ?>">
             <?php }?>
                <h3>Compte</h3>
                <p>Retrouvez ici votre compte avec vos lectures et discussions.</p>
            </a>
        </div>
    </div>

</div>