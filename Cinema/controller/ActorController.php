<?php

namespace Controller;
use Model\Connect;

class ActorController{

    public function listActors(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM person 
        INNER JOIN actor ON person.id_person = actor.id_person"); 
        require"view/actor/listActors.php";
    }
    /*détails des acteurs*/
    public function detActor($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT DISTINCT person.first_name, person.last_name, person.gender, DATE_FORMAT(person.birthday, '%d/%m/%Y') AS fr_birthday
        FROM play 
        INNER JOIN actor ON play.id_actor = actor.id_actor
        LEFT JOIN person ON actor.id_person = person.id_person
        LEFT JOIN film ON play.id_film = film.id_film
        LEFT JOIN charactere ON play.id_charactere = charactere.id_charactere
        WHERE play.id_actor = :id ");
        $requete->execute(["id" => $id]);

        $requeteRole = $pdo->prepare("SELECT DISTINCT film.id_film, film.publication, film.title, charactere.role_name, ROUND(ranking,1) as r_ranking
        FROM play 
        INNER JOIN actor ON play.id_actor = actor.id_actor
        LEFT JOIN person ON actor.id_person = person.id_person
        LEFT JOIN film ON play.id_film = film.id_film
        LEFT JOIN charactere ON play.id_charactere = charactere.id_charactere
        WHERE play.id_actor = :id 
        ORDER BY publication ASC");
        $requeteRole->execute(["id" => $id]);
        require"view/actor/detActor.php";
    }
}