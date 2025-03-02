<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class BookManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Book";
    protected $tableName = "book";

    public function __construct(){
        parent::connect();
    }

    public function lastInsert() {
        $sql = "SELECT MAX(id_book) FROM ".$this->tableName;
        return  DAO::select($sql);
    }

    
}