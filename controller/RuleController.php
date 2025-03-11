<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\BookManager;
use Model\Managers\postManager;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\CategoryManager;
use Model\Managers\CategoryBookManager;

class RuleController extends AbstractController implements ControllerInterface{

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
        $categorymanager = new CategoryManager();
        $category = $categorymanager->findOneByName("Tutos");

        $topicsManager = new TopicManager();
        $topics = $topicsManager->findTopicsByCategory($category->getId());

        return [
            "view" => VIEW_DIR."Forum_rule/tutos.php",
            "meta_description" => "Tutos : ",
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }
    public function foireAuxQuestions (){
        $categorymanager = new CategoryManager();
        $category = $categorymanager->findOneByName("FAQ");

        $topicsManager = new TopicManager();
        $topics = $topicsManager->findTopicsByCategory($category->getId());

        return [
            "view" => VIEW_DIR."Forum_rule/foireAuxQuestions.php",
            "meta_description" => "FAQ : ",
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }

}