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
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "Page d'inscription"
        ];
    }

    public function register_BDD(){
        
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
        $user = $userManager->findOneByEmail($email);
        $role = "user";
        $pass = password_hash($password,PASSWORD_DEFAULT);

        // si le mail existe on n'enregistre pas
        if ($user != null){
            Session::addFlash("error", "Compte déjà crée");
            $this->redirectTo("security", "login_form");
        }

        // Gestion de l'upload d'image
        $uploadOk = 1;
        $imageFileType = null;
        $targetFile = null;
        // on test si on a ajouter un fichier   

        if (empty($_FILES["avatar"]["name"])) { 
            Session::addFlash("error", "Le fichier n'est pas envoyer !");
            $this->redirectTo("forum", "blibliostar");
        }
        $targetDir = "public/uploads/";
        $imageFileType = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
        $targetFile = $targetDir . uniqid('avatar_') . '.' . $imageFileType; // pour que chaque livre commence par "avatar_"

        // Vérification de l'image
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check === false) {
            Session::addFlash("error", "Le fichier n'est pas une image.");
            $uploadOk = 0;
        }

        // Vérifier la taille du fichier (max 5Mo)
        if ($_FILES["avatar"]["size"] > 5000000) {
            Session::addFlash("error", "L'image est trop volumineuse (max 5 Mo).");
            $uploadOk = 0;
        }

        // Vérification du format de fichier
        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            Session::addFlash("error", "Formats acceptés : JPG, JPEG, PNG, GIF.");
            $uploadOk = 0;
        }
        // Déplacement du fichier si tout est OK
        if ($uploadOk && !move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
            Session::addFlash("error", "Erreur lors de l'upload de l'image.");
            $this->redirectTo("forum", "blibliostar");
        }
        $data = [
            "email" => $email,
            "pseudo" => $pseudo,
            "password" => $pass,
            "role" => $role,
            "avatar" => $targetFile
        ];
        
        $a = $userManager->add($data);
        
        Session::addFlash("success", "Inscription réussi ou compte déjà crée");
        header("Location: index.php"); // pour retrouner a la page d'acceuil
    }

    public function login_form () {
        return [
            "view" => VIEW_DIR."security/login.php",
            "meta_description" => "Page de connexion"
        ];
    }

    public function login (){
        if (isset($_POST['submit']))
        {
            $this->redirectTo("security", "login_form");
        }
        // on filtre les variables
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        // on verifie si le mail et le mot de passe sont donner
        if ($email == null && $password == null) {
            Session::addFlash("success", "Formulaire incomplet");
            $this->redirectTo("security", "login_form");
        }
        // on recupere l'utilisateur
        $userManager = new UserManager();
        $user = $userManager->findOneByEmail($email);
        if ($user == null){
            Session::addFlash("error", "Compte inexistant");
            $this->redirectTo("index");
        }
        //on verifie que le mot de passe est le bon
        $hash = $user->getPassword(); // on recupere le mode de passe de l'utilisateur
        if (password_verify($password, $hash)){ // si le mot de passe d'inscription est le meme que celui de connexion, il compare les empreinte numerique
            $_SESSION["user"] = $user; // on lance la session d'un utilisateur dans session
        }else {
            Session::addFlash("error", "Email ou mot de passe invalide");
            $this->redirectTo("forum", "user_account");
        }
        Session::addFlash("success", "Bienvenue!");
        $this->redirectTo("index");
    }
    public function logout () {
        unset($_SESSION["user"]); 
        $this->redirectTo("index");
    }
}