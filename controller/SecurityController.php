<?php
namespace Controller;

use App\Session;
use App\DAO;
use App\AbstractController;
use App\ControllerInterface;
//j'ai rajouter
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        return [
            "view" => VIEW_DIR."account/register.php",
            "meta_description" => "Page d'inscription"
        ];
    }

    public function register_BDD(){
        // var_dump($_POST);
        if (isset($_POST['submit']))
        {
            $this->redirectTo("security", "register");
        }

        $pseudo = filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_SPECIAL_CHARS);
        $password2 = filter_input(INPUT_POST,"password2", FILTER_SANITIZE_SPECIAL_CHARS);
        
        // si une des variables n'est pas correcte
        if (!($pseudo && $email && $password && $password2)){ 
            Session::addFlash("error", "Formulaire incomplet !");
            $this->redirectTo("security", "register");
        }

        // on verifie si les mots de passes sont different et s'il font au moins 12 caractere
        if ($password != $password2 || strlen($password)<12){
            Session::addFlash("error", "Problème dans l'inscription, recommencez !");
            $this->redirectTo("security", "register");
        }

        // on verifie que le mail n'existe pas déjà 
        $userManager = new UserManager();
        $user = $userManager->emailExist($email);
        $role = "user";
        $pass = password_hash($password,PASSWORD_DEFAULT);
        // si le mail n'existe pas on le rajoute a la bdd sinon il ira directement dans connexion (pour eviter qu'un hacker essaie d'avoir son mail/pseudo)
        if ($user == 0){
            $data = [
                "pseudo" => $pseudo,
                "email" => $email,
                "password" => $pass,
                "role" => $role
            ];
            $userManager->add($data);
        }
    
        Session::addFlash("success", "Inscription réussi ou compte déjà crée");
        header("Location: index.php"); // pour retrouner a la page d'acceuil
    }

    public function login_form () {
        return [
            "view" => VIEW_DIR."account/login.php",
            "meta_description" => "Page de connexion"
        ];
    }

    public function login (){
        if (isset($_POST['submit']))
        {
            $this->redirectTo("security", "login_form");
        }
        // on filtre les variable
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        // on verifie si le mail et le mot de passe sont donner
        if (isset($email) && isset($password)) {
            Session::addFlash("success", "Formulaire incomplet");
            header("Location: login.php");
        }
        // on recupere l'utilisateur
        $userManager = new UserManager();
        $user = $userManager->findOneByEmail($email);
        
        //on verifie que le mot de passe est le bon
        $hash = $user["password"];
        if (password_verify($password, $hash)){ // si le mot de passe d'inscription est le meme que celui de connexion, il compare les empreinte numerique
            $_SESSION["user"] = $user; // on lance la session d'un utilisateur dans session
            header("Location: home.php");
        }else {
            Session::addFlash("success", "Email ou mot de passe invalide");
        }
        header("Location: index.php"); // pour retrouner a la page d'acceuil
    }
    public function logout () {
        unset($_SESSION["user"]);
        $this->redirectTo();
    }
    


}