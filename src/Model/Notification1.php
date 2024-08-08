<?php

namespace Metarisc\Model;
use DateTime;
/*
 * Une notification est un objet créé pour avertir ou informer un utilisateur pour un évévemenent spécifique.
*/

class Notification1 extends ModelAbstract
{
    private ?string $title = null; 
private ?string $message = null; 
private ?string $type = null; 
private ?array&lt;string,string&gt; $contexte = null; 
private ?string $utilisateur_id = null; 



    public static function unserialize(array $data): Notification1
    {
        $object = new Notification1();



        
        /** @var string $data['title'] */
        $object->setTitle($data['title']);
        



        
        /** @var string $data['message'] */
        $object->setMessage($data['message']);
        



        
        /** @var string $data['type'] */
        $object->setType($data['type']);
        



        
        /** @var array&lt;string,string&gt; $data['contexte'] */
        $object->setContexte($data['contexte']);
        



        
        /** @var string $data['utilisateur_id'] */
        $object->setUtilisateurId($data['utilisateur_id']);
        

        return $object;
    }


            public function getTitle(): ?string
            {
            return $this->title;
            }






    

    
    public function setTitle(string $title = null):void
    {
        $this->title=$title;
    }

            public function getMessage(): ?string
            {
            return $this->message;
            }






    

    
    public function setMessage(string $message = null):void
    {
        $this->message=$message;
    }

            public function getType(): ?string
            {
            return $this->type;
            }






    

    
    public function setType(string $type = null):void
    {
        $this->type=$type;
    }

            public function getContexte(): ?array&lt;string,string&gt;
            {
            return $this->contexte;
            }






    

    
    public function setContexte(array&lt;string,string&gt; $contexte = null):void
    {
        $this->contexte=$contexte;
    }

            public function getUtilisateurId(): ?string
            {
            return $this->utilisateur_id;
            }






    

    
    public function setUtilisateurId(string $utilisateur_id = null):void
    {
        $this->utilisateur_id=$utilisateur_id;
    }
}


