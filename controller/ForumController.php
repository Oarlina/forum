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
    
    public function post ($id){
        $postManager = new postManager();
        $post = $postManager->findOneById($id);
        $topicManager = new TopicManager();
        $topics = $topicManager->findAll();

        return [
            "view" => VIEW_DIR."forum/post.php",
            "meta_description" => "Compte : ",
            "data" => [
                "post" => $post,
                "topics" => $topics
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

    public function blibliostar (){
        $bookManager = new bookManager;
        $books = $bookManager->findAll();
        return [
            "view" => VIEW_DIR."blibliostar/blibliostar.php",
            "meta_description" => "Blibliostar : ",
            "data" => [
                "books"=> $books
            ]
        ];
    }
    

}