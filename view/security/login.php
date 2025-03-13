<form action="index.php?ctrl=security&action=login" method="post">
    <label for="email">Votre  mail: </label><br>
    <input type="text" name="email"><br>

    <label for="password">Votre mot de passe: </label><br>
    <input type="password" name="password" id="password_login"><i class="fa-solid fa-eye" onclick="changeInput('password_login')"></i><br>

    <p>ou</p>
    <p>Se connecter avec Google</p>

    <input type="submit" value="Se connecter">
</form>