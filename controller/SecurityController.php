<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        return [
            "view" => VIEW_DIR."account/subscription.php",
            "meta_description" => "Page d'inscription"
        ];
    }
    public function login () {
        return [
            "view" => VIEW_DIR."account/connexion.php",
            "meta_description" => "Page de connexion"
        ];
    }
    public function logout () {}
}