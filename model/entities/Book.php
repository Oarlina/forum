<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne 
    peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Book extends Entity{

    private $id;
    private $title;
    private $author;
    private $edition;
    private $releaseDate;
    private $summary;
    private $gender;
    private $numberPage;
    private $img;

    // chaque entité aura le même constructeur grâce à la méthode hydrate (issue de App\Entity)
    public function __construct($data){         
        $this->hydrate($data);        
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    public function getEdition()
    {
        return $this->edition;
    }
    public function setEdition($edition)
    {
        $this->edition = $edition;

        return $this;
    }

    public function getSummary()
    {
        return $this->summary;
    }
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getNumberPage()
    {
        return $this->numberPage;
    }
    public function setNumberPage($numberPage)
    {
        $this->numberPage = $numberPage;

        return $this;
    }
    
    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    public function __toString():string {
        return $this->title;
    }

}