<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class CategoryManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Category";
    protected $tableName = "category";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findCategory() {

        $sql = "SELECT * FROM ".$this->tableName." t where typeCategory != 'FAQ' && typeCategory !='Tutos'";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function categoryPick() {

        $sql = "SELECT * FROM ".$this->tableName." t ";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }

    public function categoryById ($id){
        $sql= "SELECT  * FROM ". $this->tableName. ' WHERE id_category = '.$id;
        return $sql;
    }
    
    public function findOneByName($nameCat){
        $sql = "SELECT * FROM ". $this->tableName." WHERE typeCategory = :nameCat";
        return $this->getOneOrNullResult(
            DAO::select($sql, ["nameCat" => $nameCat], false), 
            $this->className
        );
    }



}