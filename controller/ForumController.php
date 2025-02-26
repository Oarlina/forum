<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;
use Model\Managers\postManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll();
        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        $postManager = new postManager();
        $posts = $postManager->findAll();
        $userManager = new userManager();
        $users = $userManager->findAll();
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories,
                "posts" => $posts,
                "users" => $users
            ]
        ];
    }


    public function listTopicsByCategory($id) {
    
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/detailCategory.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics,
            ]
        ];
    }

    public function listPosts (){
        $postManager = new postManager();
        $posts = $postManager->findAll();
        $userManager = new userManager();
        $users = $userManager->findAll();

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des topics : ",
            "data" => [
                "posts" => $posts,
                "users" => $users
            ]
        ];
    }

    public function user_account ($id){
        $userManager = new userManager();
        $user = $userManager->findOneById($id);

        return [
            "view" => VIEW_DIR."account/user_account.php",
            "meta_description" => "Compte : ",
            "data" => [
                "user" => $user
            ]
        ];
    }
    
    public function forum_rule (){
        return [
            "view" => VIEW_DIR."Forum_rule/forum_rule.php",
            "meta_description" => "Compte : ",
            "data" => [
            ]
        ];
    }
    public function charte (){
        return [
            "view" => VIEW_DIR."Forum_rule/charte.php",
            "meta_description" => "Charte : ",
            "data" => [
            ]
        ];
    }
    public function tutos (){
        return [
            "view" => VIEW_DIR."Forum_rule/tutos.php",
            "meta_description" => "Tutos : ",
            "data" => [
                
            ]
        ];
    }
    public function foireAuxQuestions (){
        return [
            "view" => VIEW_DIR."Forum_rule/foireAuxQuestions.php",
            "meta_description" => "FAQ : ",
            "data" => [
            ]
        ];
    }

}