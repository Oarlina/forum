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

    // m'envoie sur la page du formulaire
    public function postForm($id){
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);
        return [
            "view" => VIEW_DIR."addForm/addPost.php",
            "meta_description" => "Formulaire de post : ",
            "data" => [
                "topic" => $topic
            ]
        ];
    }

    // m'ajoute le formulaire dans la base de donnée
    public function addPostBDD($id){

        if (isset($_POST['submit'])) // si on a cliquer sur le bouton
        {
            $textPost = filter_input(INPUT_POST,"text",FILTER_SANITIZE_SPECIAL_CHARS);
            $topicManager = new TopicManager();
            $topic = $topicManager->findOneById($id);

            if ($textPost){

                $postManager = new PostManager();
                $postManager->add([
                    "textPost" => $textPost,
                    "user_id" => 1,
                    "topic_id" => $topic->getId()
                ]);
            }
            // sert a rediriger vers la page d'un topic
            $this->redirectTo ("forum","postsByTopics", $topic->getId());
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
