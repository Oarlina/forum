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
    private $user;
    private $isLock;
    private $creationDate;
    private $category;

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
    
    public function getUser(){
        return $this->user;
    }
    public function setUser($user){
        $this->user = $user;
        return $this;
    }
    
    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        $this->category = $category;
        return $this;
    }
    
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getIsLock()
    {
        return $this->isLock;
    }
    public function setIsLock($isLock)
    {
        $this->isLock = $isLock;

        return $this;
    }

    public function __toString():string{
        return $this->title;
    }
}