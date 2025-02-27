<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $meta_description ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>FORUM</title>
    </head>
    <body>
        <div id="wrapper"> 
            <div id="mainpage">
                <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
                <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
                <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
                <header>
                    <nav>
                        <div class="logo_title"> <!-- ceci est le logo du forum et son nom-->
                            <a href="index.php">
                                <img src="public/img/logo.png" alt="Logo" class="logo_header">
                                <img src="public/img/logo_nom.png" alt="Sunstar">
                            </a>
                        </div>
                        <div class="left_nav"> <!-- ceci est la future barre de recherche -->
                            <div class="search">
                                <p>Search...</p>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <?php
                            if(App\Session::isAdmin()){
                                ?>
                                <a href="index.php?ctrl=home&action=users">Voir la liste des gens</a>
                            <?php } ?>
                        </div>
                        <div class="right_nav"> <!-- ici c'est soit les boutons se connecter/ s'inscrire soit le compte et le bouton se déconnecter -->
                        <?php
                            // si l'utilisateur est connecté 
                            if(App\Session::getUser()){
                                ?>
                                <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?></a>
                                <i class="fa-solid fa-user"></i>
                                <div class="button_conexion_inscritption">
                                    <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                </div>
                                <?php
                            }
                            else{
                                ?>
                                <div class="button_conexion_inscritption">
                                    <a href="index.php?ctrl=security&action=login">Connexion</a>
                                </div>
                                <div class="button_conexion_inscritption">
                                    <a href="index.php?ctrl=security&action=register">Inscription</a>
                                </div>
                            <?php
                            }
                        ?>
                        </div>
                    </nav>
                </header>
                
                <main id="forum">
                    <?= $page ?>
                </main>
            </div>

            <footer>
                <section class="top_footer"> <!-- les mentions légales -->
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">Cookies</a>
                    <a href="#">Nous soutenir</a>
                    <a href="#">Contact</a>
                </section>
                <hr class="ligne_footer">
                <section class="bottom_footer"> <!-- la partie ou se trouve les reseaux sociaux + le peid de page qui dit l'année de creation du site -->
                    <p>Suivez-nous </p>
                    <div class="reseaux">
                        <a href="https://www.instagram.com/" target="_blank"><i class=" fa-brands fa-instagram"></i></a>
                        <a href="https://www.facebook.com/" target="_blank"><i class=" fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.x.com/" target="_blank"><i class=" fa-brands fa-x-twitter"></i></a>
                        <a href="https://www.snapchat.com/" target="_blank"><i class=" fa-brands fa-snapchat"></i></a>
                    </div>
                    <small>&copy; <?= date_create("now")->format("Y") ?> - Sunstar</small>
                </section>
            </footer>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $(".message").each(function(){
                    if($(this).text().length > 0){
                        $(this).slideDown(500, function(){
                            $(this).delay(3000).slideUp(500)
                        })
                    }
                })
                $(".delete-btn").on("click", function(){
                    return confirm("Etes-vous sûr de vouloir supprimer?")
                })
                tinymce.init({
                    selector: '.post',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            })
        </script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    </body>
</html>