<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct(){
        parent::connect();
    }

    public function findOneByEmail ($email){
        $sql = "SELECT * 
                FROM ".$this->tableName." 
                WHERE email = :email";
       
        // la requête renvoie un enregistrement ->getOneOrNullResult
        return  $this->getOneOrNullResult(
            DAO::select($sql, ["email" => $email], false), 
            $this->className
        );
    }

    public function findAllOrderByRole (){
        $sql = "SELECT * 
                FROM ".$this->tableName." 
                ORDER BY role";
       
        // la requête renvoie un enregistrement ->getOneOrNullResult
        return  $this->getMultipleResults(
            DAO::select($sql, []), 
            $this->className
        );
    }
}