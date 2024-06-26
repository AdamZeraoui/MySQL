<?php

namespace Controller;
use Model\Connect;

class CinemaController{

    /*lister les films*/
    public function listFilms(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT title, publication FROM film"); 

        require"view/film/listFilms.php";
    }
    public function listActor(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM actor 
        INNER JOIN person on actor.id_actor = person.id_person"); 

        require"view/actor/listActor.php";
    }
    /*détails des acteurs*/
    public function detActor($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT * FROM actor INNER JOIN person on actor.id_actor = person.id_person WHERE id_actor = :id ");
        $requete->execute(["id" => $id]);
        require"view/actor/detActor.php";
    }

    public function listDirector(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM director 
        INNER JOIN person on director.id_director = person.id_person"); 

        require"view/director/listDirector.php";
    }
}