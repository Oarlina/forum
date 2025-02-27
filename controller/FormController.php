<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;
use Model\Managers\postManager;
use Model\Managers\BookManager;

class FormController extends AbstractController implements ControllerInterface{

    public function post(){
        return [
            "view" => VIEW_DIR."addForm/addPost.php",
            "meta_description" => "Formulaire de post : ",
            "data" => [
            ]
        ];
    }

    public function addPost(){
        if (isset($_POST['submit'])) // si on a cliquer sur le bouton
        {
            $text = filter_input(INPUT_POST,"text",FILTER_SANITIZE_SPECIAL_CHARS);
            var_dump($text);
            if ($text){
                $postManager = new PostManager();
                $postManager->add([
                    "text" => $text,
                    "user_id" => 1
                ]);
            }


        }else{
            die("Erreur : tous les champs sont requis.");
        }
    }
    
    public function topic(){
        return [
            "view" => VIEW_DIR."addForm/addTopic.php",
            "meta_description" => "Formulaire de topic : ",
            "data" => [
            ]
        ];
    }
}
