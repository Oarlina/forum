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
            "data" => []
        ];
    }

    // m'envoie sur la page du formulaire
    public function bookForm(){
        return [
            "view" => VIEW_DIR."addForm/addBook.php",
            "meta_description" => "Formulaire de livre : ",
            "data" => []
        ];
    }
    // m'ajoute le formulaire dans la base de donnée
    public function addBookBDD(){
        
        $title = filter_input(INPUT_POST,"title",FILTER_SANITIZE_SPECIAL_CHARS);
        $author = filter_input(INPUT_POST,"author",FILTER_SANITIZE_SPECIAL_CHARS);
        $edition = filter_input(INPUT_POST,"edition",FILTER_SANITIZE_SPECIAL_CHARS);
        $releaseDate = filter_input(INPUT_POST,"releaseDate",FILTER_SANITIZE_SPECIAL_CHARS);
        $summary = filter_input(INPUT_POST,"summary",FILTER_SANITIZE_SPECIAL_CHARS);
        $numberPage = filter_input(INPUT_POST,"numberPage",FILTER_VALIDATE_INT);    
        
        if (isset($_POST['submit'])) // si on a cliquer sur le bouton
        {
                $bookManager = new bookManager();
                // pour gagner des lignes afin d'ajouter
                $data = [
                    "title" => $title,
                    "author" => $author,
                    "edition" => $edition,
                    "releaseDate" => $releaseDate,
                    "summary" => $summary,
                    "numberPage" => $numberPage
                ];

                $bookManager->add($data);
            }
        // sert a rediriger vers la page d'un topic
        $this->redirectTo ("forum","index",);
    }

    // m'envoie sur la page du formulaire
    public function CategoryBookForm(){
        $BookManager = new BookManager();
        $id = $BookManager->lastInsert();
        $id = $id[0]['MAX(id_book)'];
        $book = $BookManager->findOneById($id);
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();
        return [
            "view" => VIEW_DIR."addForm/addCategoryBook.php",
            "meta_description" => "Formulaire de livre : ",
            "data" => [
                "book" => $book,
                "categories" =>$categories
            ]
        ];
    }

    public function addCategoryBookBDD($id_book){
        
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll(); 
        
        if (isset($_POST['submit'])) // si on a cliquer sur le bouton
        {
            $bookManager = new bookManager();
            // pour gagner des lignes afin d'ajouter
            $data = [
                "title" => $title,
                "author" => $author,
                "edition" => $edition,
                "releaseDate" => $releaseDate,
                "summary" => $summary,
                "numberPage" => $numberPage
            ];

            $bookManager->add($data);
        // sert a rediriger vers la page d'un topic
        $this->redirectTo ("forum","index",);
    }

}
