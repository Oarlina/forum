<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne 
    peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Topic extends Entity{

    private $id;
    private $title;
    private $userId;
    private $category;
    private $creationDate;
    private $closed;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    
    public function getUserId(){
        return $this->userId;
    }
    public function setUserId($userId){
        $this->userId = $userId;
        return $this;
    }
    
    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        $this->category = $category;
        return $this;
    }

    public function __toString(){
        return $this->title;
    }
}