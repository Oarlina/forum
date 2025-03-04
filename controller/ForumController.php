<?php
namespace Controller;

use DateTime;
use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\BookManager;
use Model\Managers\postManager;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\CategoryManager;
use Model\Managers\CategoryBookManager;

class ForumController extends AbstractController implements ControllerInterface{

    // ****************************************************************************** / Page des principales ******************************************************************************

    // il affiche les topics DE TOUTE les catégorie
    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll();
        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        $topicsManager = new TopicManager();
        $topics = $topicsManager->findAll();

        $userManager = new userManager();
        $users = $userManager->findAll();

        // $postManager = new postManager;
        // $posts = $postManager->topicManager($topic->getId());
        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories,
                "topics" => $topics,
                "users" => $users,
                // "posts" => $posts
            ]
        ];
    }
    public function blibliostar (){
        $bookManager = new bookManager;
        $books = $bookManager->findAllBooks();
        return [
            "view" => VIEW_DIR."blibliostar/blibliostar.php",
            "meta_description" => "Blibliostar : ",
            "data" => [
                "books"=> $books
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



    // ****************************************************************************** / Page des principales ******************************************************************************

    // affiche les topics pour UNE catégorie
    public function listTopicsByCategory($id) {
    
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopicsByCategory.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics,
            ]
        ];
    }

    // il affiche un seul post
    public function postsByTopics ($idTopic){
        $postManager = new postManager();
        $posts = $postManager->findPostsByTopic($idTopic);
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($idTopic);
        $bookManager = new bookManager;
        $book = $bookManager->findoneById($topic->getBook()->getId());
        return [
            "view" => VIEW_DIR."forum/postsByTopics.php",
            "meta_description" => "Compte : ",
            "data" => [
                "posts" => $posts,
                "topic" => $topic,
                "book" => $book
            ]
        ];
    }
    public function OneBook($id_book){
        $bookManager = new bookManager;
        $book = $bookManager->findOneById($id_book);
        $ctManager = new CategoryBookManager;
        $categories = $ctManager->findCategoryByBook($id_book);
        return [
            "view" => VIEW_DIR."blibliostar/detailBook.php",
            "meta_description" => "Livre : ",
            "data" => [
                "book"=> $book,
                "categories" => $categories
            ]
        ];
    }
    



    // ****************************************************************************** / Page des formulaires ******************************************************************************

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
    
    public function topicForm($id){
        $categoryManager = new categoryManager();
        $id = $categoryManager->categoryById($id);
        $bookManager = new bookManager();
        $books = $bookManager->findBookByTopics($id);
        return [
            "view" => VIEW_DIR."addForm/addTopic.php",
            "meta_description" => "Formulaire de topic : ",
            "data" => [
                "books" => $books
            ]
        ];
    }

    // m'envoie sur la page du formulaire
    public function bookForm(){
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();
        return [
            "view" => VIEW_DIR."addForm/addBook.php",
            "meta_description" => "Formulaire de livre : ",
            "data" => [
                "categories" =>$categories
            ]
        ];
    }
    // m'ajoute le formulaire dans la base de donnée
    /*public function addBookBDD(){
        // je recupere les données du formulaire
        if (isset($_POST['submit'])) // si on a cliquer sur le bouton
        {
            $title = filter_input(INPUT_POST,"title",FILTER_SANITIZE_SPECIAL_CHARS);
            $author = filter_input(INPUT_POST,"author",FILTER_SANITIZE_SPECIAL_CHARS);
            $edition = filter_input(INPUT_POST,"edition",FILTER_SANITIZE_SPECIAL_CHARS);
            $releaseDate = filter_input(INPUT_POST,"releaseDate",FILTER_SANITIZE_SPECIAL_CHARS);
            $summary = filter_input(INPUT_POST,"summary",FILTER_SANITIZE_SPECIAL_CHARS);
            $numberPage = filter_input(INPUT_POST,"numberPage",FILTER_VALIDATE_INT);
            $categories = filter_input(INPUT_POST,"categories", FILTER_VALIDATE_INT); // va devenir un tableau car je peux avoir plusieurs categories
    
            // je fais l'enregistrement de la page de couverture du livre
            $target_dir = "public/uploads/"; // le fichier sera enregistrer ici
            $target_file = $target_dir . basename($_FILES['couvertureLivre']['name']); // donne le chemin ou il va etre enregistrer
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // recupere l'extension de l'image (on le fait en premier car si ce n'est pas une )
            $uploadOk = 1; // a 1 si le fichier est télcharger sinon 0
            // var_dump( rename( $target_dir.basename($_FILES['couvertureLivre']['name']), $target_dir.uniqid().'.'.$imageFileType, $target_file ) );
            // var_dump( move_upload_dir_file($_FILES["couvertureLivre"]["tmp_name"] ,str_replace( $target_dir.basename($_FILES['couvertureLivre']['tmp_name']), $target_dir.uniqid().'.'.$imageFileType, $target_file  ) ));
            $bookManager = new bookManager();
                $data = [
                    "title" => $title,
                    "author" => $author,
                    "edition" => $edition,
                    "releaseDate" => $releaseDate,
                    "summary" => $summary,
                    "numberPage" => $numberPage
                ];
                $book = $bookManager->add($data); // il recupere directmeent l'id grace a l'insert dans le DAO
                if ($book != null){ // je verifie que le livre a ete ajouter
                    //je rajoute ces catégories en parcourant les catégories et les ajoutant a la bdd
                    $categoryBookManager = new CategoryBookManager();
                    if ($_POST['categories'] != null){
                        foreach ($_POST['categories'] as $category){ // j'ajoute la ou les categories du livre
                            $data = [
                                "category_id" => $category,
                                "book_id"=> $book
                            ];
                                $categoryBookManager->add($data);
                            }
                            if ($_FILES["couvertureLivre"]["tmp_name"] != null){ // on verifie que l'image a ete upload
                                $check = getimagesize($_FILES["couvertureLivre"]["tmp_name"]); // je recupere la taille de l'image
                                if($check !== false) { 
                                    echo "File is an image - " . $check["mime"] . ".";
                                    $uploadOk = 1;
                                  } else {
                                    echo "File is not an image.";
                                    $uploadOk = 0;
                                  }
                                   // Vérifie si le fichier existe déjà
                                if (file_exists($target_file)) {
                                    echo "Désolé, le fichier existe déjà";
                                    $uploadOk = 0;
                                }
                                      // Vérifie la taille du fichier (elle doit etre de maximum 5mega)
                               if ($_FILES["couvertureLivre"]["size"] > 500000) {
                                    echo "Désolé, votre fichier est trop volumineux.";
                                    $uploadOk = 0;
                                }
                                // Allow certain file formats
                                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                && $imageFileType != "gif" ) {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                                }
                    
                                // Chemin temporaire où le fichier est stocké après l'upload
                                // move_uploaded_file -> déplace le fichier temporaire vers le dossier définitif
                               if (move_uploaded_file($_FILES["couvertureLivre"]["tmp_name"], $target_file)) {
                                echo "Le fichier " . (basename($_FILES["couvertureLivre"]["name"])) . " a été uploadé avec succès.";
                                } else {
                                    die("Erreur lors de l'upload du fichier.");
                                }
                            }else {
                                Session::addFlash("error", "Veuillez upload une image.");
                            }
                    }else {
                        Session::addFlash("error", "Veuillez donner les catégories du livre.");
                    }
                }else{
                    Session::addFlash("error", "Veuillez remplir les informations du livre");
                }
        }


        
        // sert a rediriger vers la page d'un topic
        $this->redirectTo ("forum","blibliostar",);
    }*/

public function addBookBDD()
{
    if (!isset($_POST['submit'])) {
        $this->redirectTo("forum", "blibliostar"); // /!\ apres un return la fonction se termine directement /!\
    }

    // Vérification des données du formulaire
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_SPECIAL_CHARS);
    $edition = filter_input(INPUT_POST, "edition", FILTER_SANITIZE_SPECIAL_CHARS);
    $releaseDate = filter_input(INPUT_POST, "releaseDate", FILTER_SANITIZE_SPECIAL_CHARS);
    $summary = filter_input(INPUT_POST, "summary", FILTER_SANITIZE_SPECIAL_CHARS);
    $numberPage = filter_input(INPUT_POST, "numberPage", FILTER_VALIDATE_INT);

    if (empty($title) || empty($author) || empty($edition) || empty($releaseDate) || empty($summary) || empty($numberPage)) { // on verifie que les données du formulaire n'est pas vide
        Session::addFlash("error", "Tous les champs sont obligatoires !");
        $this->redirectTo("forum", "blibliostar");
    }

    // Vérification et normalisation de la date
    $date = DateTime::createFromFormat('Y-m-d', $releaseDate);
    if (!$date) {
        Session::addFlash("error", "La date de sortie est invalide !");
        $this->redirectTo("forum", "blibliostar");
    }

    // Gestion de l'upload d'image
    $uploadOk = 1;
    $imageFileType = null;
    $targetFile = null;

    if (empty($_FILES["couvertureLivre"]["name"])) { // on test si on a ajouter un fichier
        Session::addFlash("error", "Le fichier n'est pas envoyer !");
        $this->redirectTo("forum", "blibliostar");
    }
    $targetDir = "public/uploads/";
    $imageFileType = strtolower(pathinfo($_FILES['couvertureLivre']['name'], PATHINFO_EXTENSION));
    $targetFile = $targetDir . uniqid('book_') . '.' . $imageFileType; // pour que chaque livre commence par "book_"

    // Vérification de l'image
    $check = getimagesize($_FILES["couvertureLivre"]["tmp_name"]);
    if ($check === false) {
        Session::addFlash("error", "Le fichier n'est pas une image.");
        $uploadOk = 0;
    }

    // Vérifier la taille du fichier (max 5Mo)
    if ($_FILES["couvertureLivre"]["size"] > 5000000) {
        Session::addFlash("error", "L'image est trop volumineuse (max 5 Mo).");
        $uploadOk = 0;
    }

    // Vérification du format de fichier
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        Session::addFlash("error", "Formats acceptés : JPG, JPEG, PNG, GIF.");
        $uploadOk = 0;
    }

    // Gestion des catégories (mis ici pour eviter de rajouter le livre ou l'image si y a pas de catégorie sélectionée)
    if (!isset($_POST['categories']) || !is_array($_POST['categories'])) { // on verifie si si les categories sont vide et si on a un tableau des categories
        Session::addFlash("error", "Veuillez sélectionner au moins une catégorie.");
        $this->redirectTo("forum", "blibliostar");
    }

    // Déplacement du fichier si tout est OK
    if ($uploadOk && !move_uploaded_file($_FILES["couvertureLivre"]["tmp_name"], $targetFile)) {
        Session::addFlash("error", "Erreur lors de l'upload de l'image.");
        $this->redirectTo("forum", "blibliostar");
    }

    // Ajout du livre en base de données
    $bookManager = new BookManager();
    $img =  $targetFile;
    $data = [
        "title" => $title,
        "author" => $author,
        "edition" => $edition,
        "releaseDate" => $releaseDate,
        "summary" => $summary,
        "numberPage" => $numberPage,
        "img" => $img
    ];
    $book = $bookManager->add($data);

    if (!$book) {
        Session::addFlash("error", "Erreur lors de l'ajout du livre.");
        $this->redirectTo("forum", "blibliostar");
    }

    $categoryBookManager = new CategoryBookManager();
    foreach ($_POST['categories'] as $category) {
        if (!is_numeric($category)) {
            continue; // Ignore les valeurs invalides
        }
        $categoryBookManager->add([
            "category_id" => (int) $category,
            "book_id" => $book
        ]);
    }

    Session::addFlash("success", "Livre ajouté avec succès !");
    $this->redirectTo("forum", "blibliostar");
}
 

    public function addCategoryForm (){
        return [
            "view" => VIEW_DIR."addForm/addCategory.php",
            "meta_description" => "Formulaire de catégorie : ",
            "data" => []
        ];
    }

    public function addCategoryBDD(){
        $CategoryManager = new CategoryManager();
        $categories = $CategoryManager->findAll(); 
        if (isset($_POST['submit'])) // si on a cliquer sur le bouton
        {
            $isExisting = false;
            // pour gagner des lignes afin d'ajouter les éléments
            foreach ($categories as $category){
                if ($category->getTypeCategory() != $_POST['category'] && $isExisting==false){
                    $data = ["typeCategory" => $_POST['category']];
                }else {
                    $isExisting=true;
                }
            }if ($isExisting ==false){
                $CategoryManager->add($data);
            }
            // sert a rediriger vers la page d'un topic
            $this->redirectTo ("forum","index",);
        }
    }


}