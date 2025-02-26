<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;

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