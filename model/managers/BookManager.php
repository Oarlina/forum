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

    public function findBookByTopics ($id){
        $sql = "SELECT * FROM ".$this->tableName." t
                WHERE gender = ". $id;
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }

    public function findAllBooks()
    {
        $sql = "SELECT * FROM ".$this->tableName." 
                ORDER BY id_book DESC";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }
}