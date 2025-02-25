<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne 
    peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class post extends Entity{

    /* les variables doivent être les mêmes que dans la base de donnée*/
    private $id;
    private $pseudo;
    private $datePost;
    private $textPost;
    private $user_id;
    private $topic_id;

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

    public function getPseudo()
    {
        return $this->pseudo;
    }public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getDatePost()
    {
        return $this->datePost;
    }public function setDatePost($datePost)
    {
        $this->datePost = $datePost;

        return $this;
    }

    public function getTextPost()
    {
        return $this->textPost;
    }
    public function setTextPost($textPost)
    {
        $this->textPost = $textPost;

        return $this;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getTopic_id()
    {
        return $this->topic_id;
    }
    public function setTopic_id($topic_id)
    {
        $this->topic_id = $topic_id;

        return $this;
    }

    public function __toString():string{
        return $this->pseudo;
    }
}

?>
