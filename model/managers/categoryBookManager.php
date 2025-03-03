<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class categoryBookManager extends Manager{
    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\CategoryBook";
    protected $tableName = "category_book";

    public function __construct(){
        parent::connect();
    }

    public function findCategoryByBook ($id){
        $sql = "SELECT * FROM ".$this->tableName." t
                WHERE book_id =". $id;
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }
}