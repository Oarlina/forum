<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class categoryBookManager extends Manager{
    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\CategoryBook";
    protected $tableName = "categorybook";

    public function __construct(){
        parent::connect();
    }
}