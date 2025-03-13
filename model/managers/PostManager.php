<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct(){
        parent::connect();
    }

    // récupére tous les posts
    public function findPosts() {
        $sql = "SELECT * FROM ".$this->tableName." p";
       
        //  la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(DAO::select($sql), $this->className);
    }

    public function findPostsByTopic ($idTopic){
        $sql = "SELECT * FROM post WHERE topic_id = :idTopic";

        return $this->getMultipleResults(
            DAO::select($sql, 
                        ["idTopic" => $idTopic]), 
                        $this->className);
    }

    public function findFirstPost($idTopic){
        $sql = "SELECT * FROM ". $this->tableName. " 
            WHERE topic_id = :idTopic 
            ORDER BY datePost ASC 
            LIMIT 1";
        return $this->getOneOrNullResult(
            DAO::select($sql, 
                        ["idTopic" => $idTopic], false), 
                        $this->className);
    }

    public function findOtherPost ($idTopic, $idFirstPost){
        $sql = "SELECT * FROM ". $this->tableName. " WHERE (topic_id = :idTopic AND id_post != :idFirstPost) ORDER BY datePost DESC";
        return $this->getMultipleResults(DAO::select($sql, ["idTopic" => $idTopic, "idFirstPost" => $idFirstPost]), $this->className);
    }

    
}