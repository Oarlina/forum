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

    public function post($id){
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


    public function addPost($id){

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
            $posts = $postManager->findAll();
            
            $userManager = new userManager();
            $users = $userManager->findAll();
            
            // return [
            //     "view" => VIEW_DIR."forum/listPosts.php",
            //     "meta_description" => "Formulaire de topic : ",
            //     "data" => [
            //         'posts'=> $posts,
            //         'users' => $users
            //         ]
            //     ]->  
            $this->redirectTo ("forum","index","");
            // header("Location:view/forum/listPosts.php");exit;
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
