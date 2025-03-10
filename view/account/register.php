<form action="index.php?ctrl=security&action=register_BDD" method="post" enctype="multipart/form-data">
    <label for="pseudo">Votre pseudo: </label><br>
    <input type="text" name="pseudo"><br>

    <label for="email">Votre mail: </label><br>
    <input type="mail" name="email"><br>

    <label for="password">Votre mot de passe: </label><br>
    <input type="password" name="password" id="registerOne"><i class="fa-solid fa-eye" onclick="changeInput('registerOne')"></i><br>

    <label for="password2">Confirmer votre mot de passe: </label><br>
    <input type="password" name="password2" id="registerTwo"><i class="fa-solid fa-eye" onclick="changeInput('registerTwo')"></i><br>

    <label for="">Entrer l'image de votre avatar: </label>
    <input type="file" name="avatar" accept="image/*"> <br>

    <input type="checkbox" name="valider"> 
    <label for="">En cliquant sur S’inscrire, vous acceptez nos Conditions d’utilisation. Consultez notre 
        Politique de confidentialité pour savoir comment nous recueillons, utilisons et transmettons vos données, 
        ainsi que notre Politique d’utilisation des témoins pour savoir comment nous utilisons les témoins et 
        d’autres moyens technologiques similaires. Vous pourriez recevoir des notifications de notre part par 
        texto, mais vous pouvez vous désinscrire à tout moment.
    </label><br>
    <p>ou</p>
    <p>S'inscrire avec Google</p>
    <input type="submit" value="S'inscrire">
</form>