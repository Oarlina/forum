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
    private $datePoste;
    private $pseudo;
    private $textPost;
    private $userId;
    private $topicId;


}

?>
