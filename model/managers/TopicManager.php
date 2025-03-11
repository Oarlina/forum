<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findTopicsByCategory($id) {

        $sql = "SELECT * FROM ".$this->tableName." t WHERE t.category_id = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function getNbPostByTopics ($id){
        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                INNER JOIN post p ON t.id_topic = p.topic_id 
                WHERE topic_id = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function findTopicsByBook($id_book){
        $sql = "SELECT * FROM ".$this->tableName." t WHERE t.book_id = :id_book";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id_book' => $id_book]), 
            $this->className
        );
    }
    public function findTopicsWhereBook(){
        $sql = "SELECT * FROM ".$this->tableName." t WHERE t.book_id != 'null'";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, []), 
            $this->className
        );
    }
}